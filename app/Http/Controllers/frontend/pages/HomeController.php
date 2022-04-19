<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\TempUserHelper;
use DB;

class HomeController extends Controller
{
    // home page content
    public function homePage(Request $request){
    	$result['sliders'] = DB::table('sliders')
            ->where(['status'=>'active'])
            ->latest()->get();

    	$result['categories'] = DB::table('categories')
            ->where(['status'=>'active'])
            ->latest()->get();

        $result['banners'] = DB::table('banners')
            ->where(['status'=>'active'])
            ->latest()->limit(1)->get();

    	$result['products'] = DB::table('products')
            ->where(['status'=>'active'])
            ->limit(12)
            ->latest()->get();
            
    	//product by product attributes show
            foreach ($result['products'] as $list1 ) {
                $result['home_products_attrs'][$list1->id] =  DB::table('product_atts')
                    ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
                    ->leftJoin('colors','colors.id','=','product_atts.attr_color')
                    ->where(['product_atts.product_id'=>$list1->id])
                    ->get();
            }

        
// echo "<pre>";
//                 print_r($cartResult);exit();

    	return view('frontend/pages/home', $result);
    }

//search proudct
    public function productSearch(Request $request ,$str){
        $result['products'] =
            //category by product show
         $query = DB::table('products');
        $query = $query->leftJoin('categories','categories.id','=','products.cat_id');
        $query = $query->leftJoin('product_atts','product_atts.product_id','=','products.id');
            $query = $query->where(['products.status'=>'active']);
                    $query = $query->where('name','like',"%$str%");
                    $query = $query->orwhere('description','like',"%$str%");
                    $query = $query->orwhere('warranty','like',"%$str%");
                    $query = $query->orwhere('price','like',"%$str%");
                    $query = $query->orwhere('mrp','like',"%$str%");
            //category sort by filtering
            $query = $query->distinct()->select(['products.*']);
            $query = $query->get();
            $result['products'] = $query;

            //product by product attributes show
            foreach ($result['products'] as $list1 ) {
                // print_r($list1->id);die();
                $query = DB::table('product_atts');
                    $query =$query = $query->leftJoin('sizes','sizes.id','=','product_atts.attr_size');
                    $query = $query->leftJoin('colors','colors.id','=','product_atts.attr_color');
                    $query = $query->where(['product_atts.product_id'=>$list1->id]);
                    
                    $query = $query->get();
                    //prx($query);
                    $result['product_atts'][$list1->id] = $query;
            }

            //product by product attributes show
            foreach ($result['products'] as $list2 ) {
                $result['search_products_attrs'][$list2->id] =  DB::table('product_atts')
                    ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
                    ->leftJoin('colors','colors.id','=','product_atts.attr_color')
                    ->where(['product_atts.product_id'=>$list2->id])
                    ->get();
            }

            // echo "<pre>";
            // print_r($result);exit;
            return view('frontend.pages.search',$result);
    }
      
// slider product
    public function sliderProduct($id){

        $result['slider_product'] = DB::table('products')
            ->where(['slider_id' => $id])
            ->where(['status' => 'active'])
            ->get();

        foreach ($result['slider_product'] as $list) {
            $result['product_attrs'] [$list->id]= DB::table('product_atts')
                ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
                ->leftJoin('colors','colors.id','=','product_atts.attr_color')
                ->where(['product_atts.product_id'=>$list->id])
                ->get();
        }

        // echo "<pre>";
        // print_r($result['slider_product']);exit;
        return view('frontend/pages/slider-product',$result);
    }

// category by product
    public function categoryProduct($id){
        $result['category_product'] = DB::table('products')
            ->where(['cat_id' => $id])
            ->where(['status' => 'active'])
            ->get();

        foreach ($result['category_product'] as $list) {
            $result['product_attrs'] [$list->id]= DB::table('product_atts')
                ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
                ->leftJoin('colors','colors.id','=','product_atts.attr_color')
                ->where(['product_atts.product_id'=>$list->id])
                ->get();
        }

        // echo "<pre>";
        // print_r($result['slider_product']);exit;
        return view('frontend/pages/category-product',$result);
    }




// bannger product
    public function bannerProduct($id){
        $result['banner_product'] = DB::table('products')
            ->where(['banner_id' => $id])
            ->where(['status' => 'active'])
            ->get();

        foreach ($result['banner_product'] as $list) {
            $result['product_attrs'] [$list->id]= DB::table('product_atts')
                ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
                ->leftJoin('colors','colors.id','=','product_atts.attr_color')
                ->where(['product_atts.product_id'=>$list->id])
                ->get();
        }

        // echo "<pre>";
        // print_r($result['slider_product']);exit;
        return view('frontend/pages/banner-product',$result);
    }


}
