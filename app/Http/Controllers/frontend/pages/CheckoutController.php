<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Helpers\TempUserHelper;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->exists('regi_user_true')){
            $customer_id = session()->get('regi_user_login');
            $checkCart = DB::table('carts')
                ->where(['user_id'=>$customer_id])
                ->get();

            if (count($checkCart) > 0) {
                
                    return view('frontend/pages/checkout');
                }else{
                    return redirect()->route('home');
                }
            }else{
                return redirect()->route('home');
            }
        
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
    public function ConformOrder(Request $request)
    {
        $valid = validator::make($request->all(),[
            'name'=> 'required',
            'mobile'=> 'required',
            'delivery_info'=> 'required|max:255',
        ]);

        if (!$valid->passes()) {
            return response()->json([
                'status'=> 'errors',
                'errors'=> $valid->errors()->toArray()
            ]);
        }else{
            // print_r($request->post('cod'));exit;
        //check payment method
            if (empty($request->post('cod'))) {
                // echo "empty";exit;
                return response()->json([
                    'status'=> 'cod_warning',
                    'msg' => 'Select Cash ON Payment Delivery Method !'
                ]);
            }

            if ($request->session()->exists('regi_user_true')) {
                ///receive data from ajax reques
                $uid = $request->session()->get('regi_user_login');
                ///received cart proudct data from helper function
                $cartProuct = TempUserHelper::cartProduct();
                $totalPrice = 0;
                foreach ($cartProuct as $list) {
                    $totalPrice =($list->qty * $list->attr_mrp);
                
                }

                $orderInfo = [
                    'customer_id' => $uid,
                    'payment_type' => $request->cod,
                    'delivery_info' => $request->delivery_info,
                    'date' => date('d-m-y'),
                    'payment_status' => "Hand Case",
                    'total_amount' => $totalPrice,
                    'rand_order_id' => 'order_id'.rand(111111111,999999999),
                ];

                // insert data in order table
                $orderId = DB::table('orders')->insertGetId($orderInfo);
                $request->session()->put('order_id',$orderId);



                
                // echo "<pre>";
                // print_r($cartProuct);exit;
                if ($orderId > 0) {

                    foreach ($cartProuct as $list) {
                        $productDetailArr['order_id'] = $orderId;
                        $productDetailArr['product_id'] = $list->pid;
                        $productDetailArr['product_attr_id'] = $list->attr_id;
                        $productDetailArr['qty'] = $list->qty;
                        $productDetailArr['price'] = $list->attr_mrp;
                        // insert order detail info in order deatil table
                       $orderDetail = DB::table('order_details')->insert($productDetailArr);
                    }

                    DB::table('carts')->where(['user_id'=>$uid,'user_type'=>'regi'])->delete();
                }
            }
            return response()->json(['status'=>'success']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function OrderSuccess()
    {
        return view('frontend/pages/success');
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
