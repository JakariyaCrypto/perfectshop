<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\backend\pages\Banner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.banner');
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
            'title'=>'required|string',
            'short_desc'=>'required|string|max:250',
            'btn_name'=>'required|string',
            'image'=>'required|mimes:jpeg,jpg,png',
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = new Banner();

             // file extention
                $image = $request->file('image');
                $imgExt = $image->extension();
                $rand   = rand(1111111111,999999999);
                $imgName = 'banner'.$rand.'.'.$imgExt;
                $image->move('uploads/banner/', $imgName);
                // print_r($imgName);die();


            // store database
            $model->title = $request->post('title');
            $model->short_desc = $request->post('short_desc');
            $model->btn_name = $request->post('btn_name');
            $model->slug = Str::slug($request->post('title'));
            $model->image = 'uploads/banner/'.$imgName;
            $model->save();

            if ( $model->save()) {
                $status = 'success';
                $msg = "Banner Inserted Successfull";
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
        $banners = Banner::latest()->get();

        return response()->json(['banners'=>$banners]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bannerEdit = banner::find($id);

        if ($bannerEdit) {
            return response()->json(['status'=>'success','bannerEdit'=>$bannerEdit]);
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
            'title'=>'required|string',
            'short_desc'=>'required|string|max:250',
            'btn_name'=>'required|string',
            'image'=>'mimes:jpeg,jpg,png',
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = Banner::find($id);
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
                $imgName = 'banner'.$rand.'.'.$imgExt;
                $image->move('uploads/banner/', $imgName);
                // store in database
             $model->image = 'uploads/banner/'.$imgName;

            }

            // store database
            $model->title = $request->post('title');
            $model->short_desc = $request->post('short_desc');
            $model->btn_name = $request->post('btn_name');
            $model->slug = Str::slug($request->post('title'));
            $model->save();

            if ($model->save()) {
                $status = 'success';
                $msg = "Banner Update Successfull";
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
        $model = Banner::find($id);

        if ($model) {
            $storedFilePath = $model->image;
            // print_r($storedFilePath);die();
            if (File::exists($storedFilePath)) {

                 File::delete($storedFilePath);

                }

            $model->delete();
            $msg = "Banner Delete Successfully !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        }else{
            return response()->json(['status'=>'error','msg'=>'Data not found !']);
        }
    }


/// banner inactive
    public function inactive(Request $request, $id)
        {
            $model = Banner::find($id);
            $model->status = 'inactive';
            $model->save();
            $msg = "Banner Successfully Inactive !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        } //end banner category


//category active
    public function active(Request $request, $id)
        {
            $model = Banner::find($id);
            $model->status = 'active';
            $model->save();
            $msg = "Banner Successfully Active !";
           return response()->json(['status'=>'success','msg'=>$msg]);
        } // end banner active




}