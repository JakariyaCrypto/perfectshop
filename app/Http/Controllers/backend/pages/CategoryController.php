<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\backend\pages\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get parent categories for dropdown
        $result['parent_cats'] = DB::table('categories')
                ->where(['parent_id'=> null])
                ->latest()->get();
                
        // get parent categories for dropdown

       
        return view('backend.admin.category', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = validator::make($request->all(),[
            'category'=>'required|string|unique:categories,category',
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = new Category();

            if ($request->hasFile('image')) {
                 // file extention
                $image = $request->file('image');
                $imgExt = $image->extension();
                $rand   = rand(1111111111,999999999);
                $imgName = 'category'.$rand.'.'.$imgExt;
                $image->move('uploads/category/', $imgName);
                 $model->image = 'uploads/category/'.$imgName;
                // print_r($imgName);die();

            }
            // store database
            $model->category = $request->post('category');
            $model->parent_id = $request->post('parent_id');
            $model->slug = Str::slug($request->post('category'));
           
            $model->save();

            if ( $model->save()) {
                $status = 'success';
                $msg = "Category Inserted Successfull";
                return response()->json(['status'=>$status,'msg'=>$msg]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categorys = Category::latest()->get();

         // parent and category id by parent category show for table
        // foreach ( $categorys as $list) {
        //     $categorys = DB::table('categories')
        //         ->where(['parent_id'=> $list->id])
        //         ->latest()->get();
        // }
        // parent and category id by parent category show for table
                // echo "<pre>";
                // print_r($result['parent_cats_show']);exit;

        return response()->json(['categorys'=>$categorys]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryEdit = Category::find($id);

        if ($categoryEdit) {
            return response()->json(['status'=>'success','categoryEdit'=>$categoryEdit]);
        }else{
            return response()->json(['status'=>'error','msg'=>'Data not found !']);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = validator::make($request->all(),[
            'category'=>'required',
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = Category::find($id);
        }
        //delete stored file
        if ($request->hasFile('image')) {
           $storedFilePath = $model->image;
            // print_r($storedFilePath);die();
            if (File::exists($storedFilePath)) {

                 File::delete($storedFilePath);

                }

               // file extention
                $image = $request->file('image');
                $imgExt = $image->extension();
                $rand   = rand(1111111111,999999999);
                $imgName = 'category'.$rand.'.'.$imgExt;
                $image->move('uploads/category/', $imgName);
                // store in database
             $model->image = 'uploads/category/'.$imgName;

            }

            // store database
            $model->category = $request->post('category');
            $model->parent_id = $request->post('parent_id');
            $model->slug = Str::slug($request->post('category'));
            $model->save();

            if ($model->save()) {
                $status = 'success';
                $msg = "Category Update Successfull";
                return response()->json(['status'=>$status,'msg'=>$msg]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Category::find($id);

        if ($model) {
            $storedFilePath = $model->image;
            // print_r($storedFilePath);die();
            if (File::exists($storedFilePath)) {

                 File::delete($storedFilePath);

                }

            $model->delete();
            $msg = "Category Delete Successfully !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        }else{
            return response()->json(['status'=>'error','msg'=>'Data not found !']);
        }
    }


/// category inactive
    public function inactive(Request $request, $id)
        {
            $model = Category::find($id);
            $model->status = 'inactive';
            $model->save();
            $msg = "Category Successfully Inactive !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        } //end category category


//category active
    public function active(Request $request, $id)
        {
            $model = Category::find($id);
            $model->status = 'active';
            $model->save();
            $msg = "Category Successfully Active !";
           return response()->json(['status'=>'success','msg'=>$msg]);
        } // end category active




}