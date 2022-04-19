<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\backend\pages\Size;

class SizeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.size');
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
            'size'=>'required|unique:sizes,size',
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = new Size();
            // store database
            $model->size = $request->post('size');
            $model->save();
            if ( $model->save()) {
                $status = 'success';
                $msg = "Size Inserted Successfull";
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
        $sizes = Size::latest()->get();

        return response()->json(['sizes'=>$sizes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sizeEdit = Size::find($id);

        if ($sizeEdit) {
            return response()->json(['status'=>'success','sizeEdit'=>$sizeEdit]);
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
            'size'=>'required|:unique:sizes,size'.$request->post('id'),
        ]);

        if(!$valid->passes()){
            $status = 'errors';
            return response()->json([
                'status'=>$status,
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{

            $model = Size::find($id);
            // store database
            $model->size = $request->post('size');
            $model->save();

            if ($model->save()) {
                $status = 'success';
                $msg = "Size Update Successfull";
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
        $model = Size::find($id);

        if ($model) {
            $model->delete();
            $msg = "Size Delete Successfully !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        }else{
            return response()->json(['status'=>'error','msg'=>'Data not found !']);
        }
    }


/// slider inactive
    public function inactive(Request $request, $id)
        {
            $model = Size::find($id);
            $model->status = 'inactive';
            $model->save();
            $msg = "Size Successfully Inactive !";
            return response()->json(['status'=>'success','msg'=>$msg]);
        } //end slider category


//category active
    public function active(Request $request, $id)
        {
            $model = Size::find($id);
            $model->status = 'active';
            $model->save();
            $msg = "Size Successfully Active !";
           return response()->json(['status'=>'success','msg'=>$msg]);
        } // end category active




}
