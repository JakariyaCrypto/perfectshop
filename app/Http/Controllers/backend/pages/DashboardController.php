<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\pages\Admin;
use DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['products'] = DB::table('products')->get();
        $result['customers'] = DB::table('customers')->get();
        $result['total_orders'] = DB::table('orders')->get();
        $result['succes_orders'] = DB::table('orders')->where(['order_status'=>'success'])->get();
        $result['today_succes_orders'] = DB::table('orders')
            ->where(['order_status'=>'success','date'=>date('d-m-y')])
        ->get();

        $result['orders'] = DB::table('orders')
            ->where(['date'=>date('d-m-y')])
            ->latest()
            ->get();
        // echo "<pre>";
        // print_r($result);exit;

            if (session()->has('loggedUser')) {
                $userId = session()->has('loggedUser');
                $data = ['loggedUserInfo'=>Admin::where('id','=',$userId)->first()];
                // print_r($data);exit;
            }
        return view('backend/admin/dashboard', $result,$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
