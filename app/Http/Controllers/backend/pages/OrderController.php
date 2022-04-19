<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['orders'] = DB::table('orders')->latest()->get();
        return view('backend.admin/orders/all-order',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderDetail(Request $request, $order_id,$customer_id){

        $result['order_detail'] =  DB::table('order_details')
        ->select('orders.*','order_details.price','order_details.qty','products.name as pname','product_atts.attr_image','sizes.size','colors.color','customers.name','customers.mobile','customers.image')
        ->leftJoin('orders','orders.id','=','order_details.order_id')
        ->leftJoin('product_atts','product_atts.id','=','order_details.product_attr_id')
        ->leftJoin('customers','customers.id','=','orders.customer_id')
        ->leftJoin('products','products.id','=','product_atts.product_id')
        ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
        ->leftJoin('colors','colors.id','=','product_atts.attr_color')
        ->where(['orders.id'=>$order_id])
        ->where(['orders.customer_id'=>$customer_id])
        ->get();

        // echo "<pre>";
        // print_r($result);

        if (!isset($result['order_detail'][0])) {
            return redirect('/');
            
        }

        return view('backend/admin/orders/order-detail',$result);
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
    public function updateOrderStatus(Request $request)
    {
        $updateOrderStatus = DB::table('orders')
            ->where(['id'=>$request->post('order_id')])
            ->update([
                'order_status'=> $request->post('order_status'),
                'add_track_info'=> $request->post('add_track_info'),
            ]);

            if ($updateOrderStatus) {
                return response()->json(['status'=>'success','msg'=>'Order Status Update Successfull']);
            }
        // print_r($request->post('order_status'));   
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
    public function destroy(Request $request, $id)
    {
        $order = DB::table('orders')
            ->where(['id'=>$id])
            ->get();

            $delOrder = DB::table('orders')
                ->where(['id'=>$id])
                ->delete();

            // delete order by all order detail 
            foreach ($order as $list) {
              DB::table('order_details')
                    ->where(['order_id'=>$list->id])
                    ->delete();
            }

            return redirect()->route('all.order')->with('danger','Order Deleted Successfull ');
            // echo "<pre>";
            // print_r($del);exit;
    }
}
