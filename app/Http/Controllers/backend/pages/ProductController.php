<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use File;
use Validator;
use App\Models\backend\pages\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function processProduct($id='')
    {

        // product edit content
        if($id>0){
            $arr = Product::where(['id'=>$id])->get();
            $result['cat_id'] = $arr['0']->cat_id;
            $result['brand_id'] = $arr['0']->brand_id;
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            // print_r( $result['image']);exit;
            $result['description'] = $arr['0']->description;
            $result['warranty'] = $arr['0']->warranty;
            $result['size_id'] = $arr['0']->size_id;
            $result['color_id'] = $arr['0']->color_id;
            $result['price'] = $arr['0']->price;
            $result['mrp'] = $arr['0']->mrp;
            $result['banner_id'] = $arr['0']->banner_id;
            $result['slider_id'] = $arr['0']->slider_id;
            $result['sub_cat_id'] = $arr['0']->sub_cat_id;
            $result['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id;

            // product id by product attributes get
             $result['product_attrs'] = DB::table('product_atts')->where(['product_id'=>$id])->get();

             // product id by product attributes get
             // echo '<pre>';
             // print_r($result['product_images_arr']);exit;

        }else{
            $result['cat_id'] = '';
            $result['name'] = '';
            $result['image'] = '';
            $result['brand_id'] = '';
            $result['description'] = '';
            $result['warranty'] = '';
            $result['size_id'] = '';
            $result['color_id'] = '';
            $result['price'] = '';
            $result['mrp'] = '';
            $result['banner_id'] = '';
            $result['slider_id'] = '';
            $result['sub_cat_id'] = '';
            $result['status'] = '';
            $result['id'] = 0;

            //product attributes

            $result['product_attrs'][0]['id'] = '';
            $result['product_attrs'][0]['product_id'] = '';
            $result['product_attrs'][0]['attr_size'] = '';
            $result['product_attrs'][0]['attr_color'] = '';
            $result['product_attrs'][0]['attr_mrp'] = '';
            $result['product_attrs'][0]['attr_price'] = '';
            $result['product_attrs'][0]['attr_qty'] = '';
            $result['product_attrs'][0]['attr_image'] = '';


        }
        // end product edit content

        // get all for product
        $result['categories'] = DB::table('categories')->latest()->get();
        $result['brands'] = DB::table('brands')->latest()->get();
        $result['sizes'] = DB::table('sizes')->latest()->get();
        $result['colors'] = DB::table('colors')->latest()->get();
        $result['sliders'] = DB::table('sliders')->latest()->get();
        $result['banners'] = DB::table('banners')->latest()->get();
        // get all for product
        
        foreach ($result['categories'] as $list) {
            $result['sub_cats'][$list->id] = DB::table('categories')
                ->where(['parent_id'=> $list->id])
                ->get();
        }
        // echo "<pre>";
        // print_r($result['sub_cats']);exit;
        return view('backend/admin/product/add-product',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $result['products'] = DB::table('products')
                ->latest()->get();

        foreach ($result['products'] as $list) {
        $result['cats'][$list->id] = DB::table('categories')
        ->where(['id'=>$list->cat_id])
        ->get();
        }
        foreach ($result['products'] as $list) {
            $result['product_atts'][$list->id] = DB::table('product_atts')
                ->where(['product_id'=>$list->id])
                ->get();
        }
        // echo "<pre>";
        // print_r($result);
      // exit;
        return view('backend/admin/product/manage-product',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->post('product_id')>0) {

            $imageValidation = 'mimes:jpeg,jpg,png';
            // print_r($imageValidation);exit;

        }else{

             $imageValidation = 'required|mimes:jpeg,jpg,png';
             
        }

        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'mrp'=>'required',
            'name'=>'required',
            'image'=> $imageValidation,
            'description'=>'required',
        ]);

        // print_r($request);exit;
        $paid_idArr = $request->post('paid');
        $size_idArr = $request->post('attr_size');
        $color_idArr = $request->post('attr_color');
        $mprArr = $request->post('attr_mrp');
        $priceArr = $request->post('attr_price');
        $qtyArr = $request->post('attr_qty');


        if ($request->post('product_id')>0) {

            $product_id    = $request->post('product_id');
            $model = Product::find($product_id);
            $msg   = "Product Updated Successfull !";
            
        }else{

            $model = new Product();
            $msg   = "Product Insert Successfull !";
        }

        
        //imge uploade 
        if ($request->hasfile('image')) {

            if ($request->post('product_id')>0) {

                $ArrImage = DB::table('products')->where(['id'=>$request->post('product_id')])->get();

                if ( File::exists('uploads/product'.$ArrImage[0]->image)) {

                     File::delete('uploads/product'.$ArrImage[0]->image);

                    }
                }

                $image = $request->file('image');
                $ext   = $image->extension();
                $imageName = time().'id'.$request->post('product_id').'.'.$ext;
                $image->move('uploads/product',$imageName);
                $model->image = 'uploads/product/'.$imageName;
         }

        $model->cat_id = $request->post('cat_id');
        $model->sub_cat_id = $request->post('sub_cat_id');
        $model->brand_id = $request->post('brand_id');
        $model->banner_id = $request->post('banner_id');
        $model->slider_id = $request->post('slider_id');
        $model->size_id = $request->post('size_id');
        $model->color_id = $request->post('color_id');
        $model->name = $request->post('name');
        $model->slug = $request->post('name');
        $model->description = $request->post('description');
        $model->price = $request->post('price');
        $model->mrp = $request->post('mrp');
        $model->warranty = $request->post('warranty');
        $model->date = date('m-d-y');


        $model->save();
        $pid = $model->id;
 
        /*product attributes start */

        foreach ($mprArr as $key => $val) {
            $productAttArr = [];
            $productAttArr['product_id'] = $pid;

            if ($size_idArr[$key] == '') {
                $productAttArr['attr_size'] = 0;
            }else{
                $productAttArr['attr_size'] = $size_idArr[$key];
            }

            if ($color_idArr[$key] == '') {
                $productAttArr['attr_color'] = 0;
            }else{
                $productAttArr['attr_color'] = $color_idArr[$key];
            }

            $productAttArr['attr_mrp'] = $mprArr[$key];
            $productAttArr['attr_price'] = $priceArr[$key];
            $productAttArr['attr_qty'] = $qtyArr[$key];

             // $productAttArr['attr_image'] = 'test';

            if ($request->hasFile("attr_image.$key")) {
    // Uninitialized string offset: 1 error show here whren name="name[]" array not use
                    if ($paid_idArr[$key] !== null) {
                        $paid = $paid_idArr[$key];
                        $ArrImage = DB::table('product_atts')->where(['id'=>$paid])->get();

                        if ( File::exists('uploads/AttrImage'.$ArrImage[0]->attr_image)) {

                             File::delete('uploads/AttrImage'.$ArrImage[0]->attr_image);

                            }
                    }

                    $rand = rand('111111111','999999999');
                    $attr_image = $request->file("attr_image.$key");
                    $ext   = $attr_image->extension();
                    $imageName = time().$rand.'.'.$ext;
                    $request->file("attr_image.$key")->move('uploads/AttrImage',$imageName);
                    $productAttArr['attr_image'] = 'uploads/AttrImage/'.$imageName;

            }

            // update product attributes
            if ($paid_idArr[$key] != '') {
                $paid = $paid_idArr[$key];
               DB::table('product_atts')->where(['id'=>$paid])->update($productAttArr);

            }else{

                DB::table('product_atts')->insert($productAttArr);

            }
            
        }
        /*product attributes end */


        // /*product multi images start */
        //     $pImgsidArr = $request->post('pIid');
        //     foreach ($pImgsidArr as $key => $val) {
        //             $productImagesArr['products_id'] = $pid;     //main product id
        //             if ($request->hasFile("images.$key")) {

        //             if ($pImgsidArr[$key] != '') {
        //             $pImgsid = $pImgsidArr[$key];
        //             $ArrImage = DB::table('product_images')->where(['id'=>$pImgsid])->get();

        //             if ( Storage::exists('/public/media/'.$ArrImage[0]->images)) {

        //                  Storage::delete('/public/media/'.$ArrImage[0]->images);

        //                 }
        //             }

        //             $rand = rand('111111111','999999999');
        //             $images = $request->file("images.$key");
        //             $ext   = $images->extension();
        //             $imageName = time().$rand.'.'.$ext;
        //             $request->file("images.$key")->storeAs('/public/media/Multi_imgs',$imageName);
        //             $productImagesArr['images'] = 'Multi_imgs/'.$imageName;

        //         }

        //         // update product attributes
        //         if ($pImgsidArr[$key] != '') {
        //             $pImgsid = $pImgsidArr[$key];
        //            DB::table('product_images')->where(['id'=>$pImgsid])->update($productImagesArr);

        //         }else{

        //             DB::table('product_images')->insert($productImagesArr);

        //         }
        //     }
        // /*product multi images end */
        $request->session()->flash('success',$msg);
        return redirect()->route('manage.product');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // product attributes detele
    public function ProductAttrDelete(Request $request,$paid,$pid)
        {

            $ArrImage = DB::table('product_atts')->where(['id'=>$paid])->get();

            if ( File::exists('/uploads/AttrImage/'.$ArrImage[0]->attr_image)) {

                 File::delete('/uploads/media/'.$ArrImage[0]->attr_image);

            }
           
            DB::table('product_atts')->where(['id'=>$paid])->delete();

            $request->session()->flash('danger','Product Attributes Delete Successfull !');

            return redirect('/dashboard/add-product/'.$pid);

        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewProduct($id)
    {
        // get single view product for admin
        $result['product'] = DB::table('products')
            ->where(['id'=>$id])
            ->get();
        // get color by product color_id
            foreach ($result['product'] as $list) {
                $result['colors'] [$list->id] = DB::table('colors')
                 ->where(['id'=>$list->color_id])   
                    ->get();
            }
            // get size by product size_id
            foreach ($result['product'] as $list) {
                $result['sizes'] [$list->id] = DB::table('sizes')
                 ->where(['id'=>$list->size_id])   
                    ->get();
            }
            // get product attritues by product id
            foreach ($result['product'] as $list) {
                $result['product_atts'] [$list->id] = DB::table('product_atts')
                 ->where(['product_id'=>$list->id])   
                    ->get();
            }
            // get product attributes by size
            // foreach ($result['product_atts'] as $color_list) {
            //     $result['atts_colors'] [$color_list->id] = DB::table('colors')
            //      ->where(['id'=>$color_list->attr_color])   
            //         ->get();
            // }

            // echo "<pre>";
            // print_r($result['product_atts']);exit;
        return view('backend/admin/product/view-product',$result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProductAttributes(Request $request,$attr_id,$pid)
    {
        $ProductAttributeDel = DB::table('product_atts')
            ->where(['id'=> $attr_id])
            ->delete();

            if($ProductAttributeDel){
                return redirect('dashboard/product/view-product/'.$pid)->with('message','product attributes deleted');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // get product by product id
        $product = DB::table('products')->where(['id'=>$id])->get();
        // delete product 
       $productDel = DB::table('products')
        ->where(['id'=>$id])
        ->delete();

        // delete all prouct attributes by product id
        if ($product) {
            foreach ($product as $list) {
               DB::table('product_atts')
                ->where(['product_id'=>$list->id])
                ->delete();
            }
        }
        
        $request->session()->flash('danger','Product Deleted Successfully ');
        return redirect()->route('manage.product');
    }

///product inactive
    public function productInactive($id){
        $Inactive = DB::table('products')
            ->where(['id'=>$id])
            ->update(['status'=> 'inactive']);
        if($Inactive){
            return redirect()->route('manage.product')->with('message','Product Status Inactive Successfull');
        }

    }

    ///product activew
    public function productActive($id){
        $Inactive = DB::table('products')
            ->where(['id'=>$id])
            ->update(['status'=> 'active']);
        if($Inactive){
            return redirect()->route('manage.product')->with('message','Product Status Active Successfull');
        }

    }
}
