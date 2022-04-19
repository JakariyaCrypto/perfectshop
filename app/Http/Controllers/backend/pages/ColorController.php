<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
use App\Models\backend\pages\Color;

class ColorController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.color');
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
            'color'=>'required|unique:colors,color',
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = new Color();
            // store database
            $model->color = $request->post('color');
            $model->save();
            if ( $model->save()) {
                $status = 'success';
                $msg = "Color Inserted Successfull";
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
        $colors = Color::latest()->get();

        return response()->json(['colors'=>$colors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colorEdit = Color::find($id);

        if ($colorEdit) {
            return response()->json(['status'=>'success','colorEdit'=>$colorEdit]);
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
            'color'=>'required|:unique:colors,color'.$request->post('id'),
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = Color::find($id);
            // store database
            $model->color = $request->post('color');
            $model->save();

            if ($model->save()) {
                $status = 'success';
                $msg = "Color Update Successfull";
                return response()->json(['status'=>$status,'msg'=>$msg]);
            }
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
        $model = Color::find($id);

        if ($model) {
            $model->delete();
            $msg = "Color Delete Successfully !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        }else{
            return response()->json(['status'=>'error','msg'=>'Data not found !']);
        }
    }


/// slider inactive
    public function inactive(Request $request, $id)
        {
            $model = Color::find($id);
            $model->status = 'inactive';
            $model->save();
            $msg = "Color Successfully Inactive !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        } //end slider category


//category active
    public function active(Request $request, $id)
        {
            $model = Color::find($id);
            $model->status = 'active';
            $model->save();
            $msg = "Color Successfully Active !";
           return response()->json(['status'=>'success','msg'=>$msg]);
        } // end category active




}

