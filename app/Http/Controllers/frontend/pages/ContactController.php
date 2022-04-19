<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend/pages/contact');
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
            'name'=>'required|max:100|min:2',
            'mobile'=>'required|numeric|min:11',
        ]);

        if(!$valid->passes()){
            return response()->json([
                'status'=>'errors',
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{
            $contactInfo = [
                'name' => $request->post('name'),
                'mobile' => $request->post('mobile'),
                'desc' => $request->post('name'),
                'date' => date('d-m-y'),
            ];

            if ($contactInfo) {
                DB::table('contacts')->insert($contactInfo);
                return response()->json([
                    'status'=>'success','msg'=>'Contact Information Submitted'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aboutPage()
    {
        return view('frontend/pages/term');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
