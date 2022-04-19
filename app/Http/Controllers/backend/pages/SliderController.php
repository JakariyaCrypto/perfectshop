<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\backend\pages\Slider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.slider');
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
            'image'=>'required|mimes:jpeg,jpg,png',
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = new Slider();

             // file extention
                $image = $request->file('image');
                $imgExt = $image->extension();
                $rand   = rand(1111111111,999999999);
                $imgName = 'Slider'.$rand.'.'.$imgExt;
                $image->move('uploads/Slider/', $imgName);
                // print_r($imgName);die();


            // store database
            $model->title = $request->post('title');
            $model->price = $request->post('price');
            $model->short_desc = $request->post('short_desc');
            $model->btn_name = $request->post('btn_name');
            $model->slug = Str::slug($request->post('title'));
            $model->image = 'uploads/Slider/'.$imgName;
            $model->save();

            if ( $model->save()) {
                $status = 'success';
                $msg = "Slider Inserted Successfull";
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
        $sliders = Slider::latest()->get();

        return response()->json(['sliders'=>$sliders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliderEdit = Slider::find($id);

        if ($sliderEdit) {
            return response()->json(['status'=>'success','sliderEdit'=>$sliderEdit]);
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
            'image'=>'mimes:jpeg,jpg,png',
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = Slider::find($id);
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
                $imgName = 'Slider'.$rand.'.'.$imgExt;
                $image->move('uploads/Slider/', $imgName);
                // store in database
             $model->image = 'uploads/Slider/'.$imgName;

            }

            // store database
            $model->title = $request->post('title');
            $model->price = $request->post('price');
            $model->short_desc = $request->post('short_desc');
            $model->btn_name = $request->post('btn_name');
            $model->slug = Str::slug($request->post('title'));
            $model->save();

            if ($model->save()) {
                $status = 'success';
                $msg = "Slider Update Successfull";
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
        $model = Slider::find($id);

        if ($model) {
            $storedFilePath = $model->image;
            // print_r($storedFilePath);die();
            if (File::exists($storedFilePath)) {

                 File::delete($storedFilePath);

                }

            $model->delete();
            $msg = "Slider Delete Successfully !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        }else{
            return response()->json(['status'=>'error','msg'=>'Data not found !']);
        }
    }


/// Slider inactive
    public function inactive(Request $request, $id)
        {
            $model = Slider::find($id);
            $model->status = 'inactive';
            $model->save();
            $msg = "Slider Successfully Inactive !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        } //end Slider category


//category active
    public function active(Request $request, $id)
        {
            $model = Slider::find($id);
            $model->status = 'active';
            $model->save();
            $msg = "Slider Successfully Active !";
           return response()->json(['status'=>'success','msg'=>$msg]);
        } // end Slider active




}