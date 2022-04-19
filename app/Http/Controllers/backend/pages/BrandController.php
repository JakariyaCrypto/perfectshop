<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\backend\pages\Brand;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.brand');
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
            'name'=>'required|string',
            'image'=>'required|mimes:jpeg,jpg,png',
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = new Brand();

             // file extention
                $image = $request->file('image');
                $imgExt = $image->extension();
                $rand   = rand(1111111111,999999999);
                $imgName = 'Brand'.$rand.'.'.$imgExt;
                $image->move('uploads/Brand/', $imgName);
                // print_r($imgName);die();


            // store database
            $model->name = $request->post('name');
            $model->slug = Str::slug($request->post('name'));
            $model->image = 'uploads/Brand/'.$imgName;
            $model->save();

            if ( $model->save()) {
                $status = 'success';
                $msg = "Brand Inserted Successfull";
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
        $brands = Brand::latest()->get();

        return response()->json(['brands'=>$brands]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brandEdit = Brand::find($id);

        if ($brandEdit) {
            return response()->json(['status'=>'success','brandEdit'=>$brandEdit]);
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
            'name'=>'required|string',
            'image'=>'mimes:jpeg,jpg,png',
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = Brand::find($id);
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
                $imgName = 'Brand'.$rand.'.'.$imgExt;
                $image->move('uploads/Brand/', $imgName);
                // store in database
             $model->image = 'uploads/Brand/'.$imgName;

            }

            // store database
            $model->name = $request->post('name');
            $model->slug = Str::slug($request->post('name'));
            $model->save();

            if ($model->save()) {
                $status = 'success';
                $msg = "Brand Update Successfull";
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
        $model = Brand::find($id);

        if ($model) {
            $storedFilePath = $model->image;
            // print_r($storedFilePath);die();
            if (File::exists($storedFilePath)) {

                 File::delete($storedFilePath);

                }

            $model->delete();
            $msg = "Brand Delete Successfully !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        }else{
            return response()->json(['status'=>'error','msg'=>'Data not found !']);
        }
    }


/// slider inactive
    public function inactive(Request $request, $id)
        {
            $model = Brand::find($id);
            $model->status = 'inactive';
            $model->save();
            $msg = "Brand Successfully Inactive !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        } //end slider category


//category active
    public function active(Request $request, $id)
        {
            $model = Brand::find($id);
            $model->status = 'active';
            $model->save();
            $msg = "Brand Successfully Active !";
           return response()->json(['status'=>'success','msg'=>$msg]);
        } // end category active




}
