<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\TempUserHelper;
use DB;
class SingleProduct extends Controller
{
    public function sigleProduct(Request $request,$slug){
    	// echo $slug;
    	$result['single_product'] = DB::table('products')
    		->where(['slug' => $slug])
    		->where(['status' => 'active'])
    		->get();

    	foreach ($result['single_product'] as $list) {
    		$result['product_attrs'] [$list->id]= DB::table('product_atts')
    			->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
    			->leftJoin('colors','colors.id','=','product_atts.attr_color')
    			->where(['product_atts.product_id'=>$list->id])
    			->get();
    	}

    	//product cat_id by category get
    	foreach ($result['single_product'] as $list) {
    		$result['product_cat'] [$list->cat_id] = DB::table('categories')
    			->where(['id'=> $list->cat_id])
    			->get();
    	}

    	//product brand_id by brand get
    	foreach ($result['single_product'] as $list) {
    		$result['pro_barand'][$list->brand_id] = DB::table('brands')
    			->where(['id'=>$list->brand_id])
    			->get();
    	}

        $result['related_products'] = DB::table('products')
            ->where(['status'=>'active'])
            ->where('slug','!=',$slug)
            ->where(['cat_id'=>$result['single_product'][0]->cat_id])
            ->get();
            //product by product attributes show
            foreach ($result['related_products'] as $list1 ) {
                $result['related_products_attrs'][$list1->id] =  DB::table('product_atts')
                    ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
                    ->leftJoin('colors','colors.id','=','product_atts.attr_color')
                    ->where(['product_atts.product_id'=>$list1->id])
                    ->get();
            }


    		// echo "<pre>";
    		// print_r($result['product_attrs']);exit;
    	return view('frontend/pages/single-product', $result);
    }




    // single product add to cart
    public function addToCart(Request $request){
        // check regi user is login 
        if ($request->session()->has('regi_user_login')) {
            
            $uid = $request->session()->get('regi_user_login');
            $user_type = "regi";

        }else{

            $uid = TempUserHelper::TempUser();
            $user_type = "not-regi";

        }

       ///recived all form ajax 
        $size = $request->post('size_id');
        $color = $request->post('color_id');
        $product_id = $request->post('product_id');
        $qty = $request->post('pqty');
        $edit_qty = $request->post('edit_qty');
        // $editqty = $request->post('qty');
        // print_r($product_id);exit; edit_qty

        //get size and color products by their id
        if($request->post('product_id')){
             $result = DB::table('product_atts')
                
                ->leftJoin('colors','colors.id','=','product_atts.attr_color')
                ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
                ->where(['product_id'=> $product_id])
                ->where(['colors.color'=> $color])
                ->where(['sizes.size'=> $size])
                ->select('product_atts.id')
                ->get();
           
                $product_attr_id = $result[0]->id; //offset 0 error is here is cache problem
        }
       
       // echo "<pre>";
       //      print_r($product_attr_id);exit;
          

        // get cart products by product_id,product_attr_id,user_type ect form cart
            $checkCart = DB::table('carts')
                ->where([
                    'product_id' => $product_id,     
                    'user_type' => $user_type,     
                    'user_id' => $uid,     
                    'product_attr_id' => $product_attr_id,    
                ])
                ->get();
                
                // check exits product in cart
                if (isset($checkCart[0]) > 0) {
                        $cart_id = $checkCart[0]->id;
                    if ($qty == 0) {
                        DB::table('carts')
                            ->where(['id'=>$cart_id])
                            ->where(['product_id'=>$product_id])
                            ->where(['product_attr_id'=>$product_attr_id])
                            ->delete();

                        $status = 'delete';
                        $msg = 'Your Cart Product is Deleted ';
                        // return response()->json(['status'=>'del','msg'=>$msg]);
                    }
                    else{
                        $product_id = $checkCart[0]->product_id;
                        DB::table('carts')
                        ->where(['id'=>$cart_id])
                        ->where(['product_id'=>$product_id])
                        ->update(['qty'=>$qty]);
                        $status = 'update';
                        $msg = 'Your Cart Product is Updated';
                        // return response()->json(['status'=>'update','msg'=>$msg]);
                    }

                    // $status = 'exists';
                    // $msg = 'product is exists your cart';
                     // return response()->json(['status'=>'exit','msg'=>$msg]);
                }else{
                    // product add to cart
                    $insertCart = DB::table('carts')->insertGetId([
                        'product_id' => $product_id,     
                        'user_type' => $user_type,     
                        'user_id' => $uid,     
                        'product_attr_id' => $product_attr_id,   
                        'qty' => $qty,   
                        'date' => date('m-d-y'),
                    ]);

                    $status = 'success';
                    $msg = "Product is Added to Cart Successful ";
                    // return response()->json(['status'=>'success','msg'=>$msg]);
                }
            // delete cart product
            
                $cartResult = DB::table('carts')
                ->leftJoin('products','products.id','=','carts.product_id')
                ->leftJoin('product_atts','product_atts.id','=','carts.product_attr_id')
                 ->leftJoin('colors','colors.id','=','product_atts.attr_color')
                ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
                ->where(['user_id'=>$uid])
                ->where(['user_type'=>$user_type])
                ->select(
                    'carts.qty','products.name','products.image','products.slug',
                    'products.id as pid','sizes.size','colors.color','product_atts.attr_mrp',
                    'product_atts.attr_image','product_atts.id as attr_id'
                )->get();

                // echo "<pre>";
                // print_r($cartResult);
            return (['msg'=>$msg, 'status'=>$status, 'data'=>$cartResult,'TotalItem'=>count($cartResult)]);
    }




// cart page product
public function cartPageProduct(Request $request){

    if (session()->exists('regi_user_login')) {
       
     if ($request->session()->has('regi_user_login')) {
            
            $uid = $request->session()->get('regi_user_login');
            $user_type = "regi";

        }else{

            $uid = TempUserHelper::TempUser();
            $user_type = "not-regi";

        }

        $result['cart_produccts'] = DB::table('carts')
                ->leftJoin('products','products.id','=','carts.product_id')
                ->leftJoin('product_atts','product_atts.id','=','carts.product_attr_id')
                 ->leftJoin('colors','colors.id','=','product_atts.attr_color')
                ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
                ->where(['user_id'=>$uid])
                ->where(['user_type'=>$user_type])
                ->select(
                    'carts.qty','products.name','products.image','products.slug',
                    'products.id as pid','sizes.size','colors.color','product_atts.attr_mrp',
                    'product_atts.attr_image','product_atts.id as attr_id'
                )->get();

                // echo "<pre>";
                // print_r($results['cart_produccts'] );exit;

    return view('frontend/pages/cart',$result);

    }else{
        return redirect()->route('registration');
    }
}


}


