<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\TempUserHelper;
use Barryvdh\DomPDF\Facade\Pdf;
use Validator;
use DB;
use Crypt;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.registration');
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
    public function Registraion(Request $request)
    {
        $valid = validator::make($request->all(),[
            'name'=>'required|max:100|min:2',
            'mobile'=>'required|numeric|min:11|unique:customers,mobile',
            'password'=>'required|min:6',
        ]);

        if(!$valid->passes()){
            return response()->json([
                'status'=>'errors',
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{
            $customer = [
                'name'=>$request->post('name'),
                'password'=>Crypt::encrypt($request->post('password')),
                'mobile'=>$request->post('mobile'),
                'image'=>'frontend/assets/img/profile-icon.png'
            ];

            $customerId = DB::table('customers')->insertGetId($customer);


            if ($customer) {

                    $checkCustomer = DB::table('customers')
                    ->where(['id'=>$customerId])
                    ->get();
                    
                    // update cart 
                    $uid = TempUserHelper::TempUser();

                       $updateCart = DB::table('carts')
                        ->where(['user_id'=>$uid,'user_type'=>'not-regi'])
                        ->update(
                            [
                                'user_id'=>$checkCustomer[0]->id,
                                'user_type'=>'regi',
                            ]
                        );

                      $request->session()->put('regi_user_true',true);
                      $request->session()->put('regi_user_login',$checkCustomer[0]->id);
                      $request->session()->put('regi_name',$checkCustomer[0]->name);
                      $request->session()->put('regi_image',$checkCustomer[0]->image);
                      $request->session()->put('regi_mobile',$checkCustomer[0]->mobile);

                    return response()->json(['status'=>'success']);
            }
        }
        // print_r($request->post('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Login(Request $request)
    {
        $valid = validator::make($request->all(),[
            'mobile'=> 'required|numeric',
            'password'=> 'required',
        ]);

        if (!$valid->passes()) {
            return response()->json([
                'status'=>'errors',
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{
            $checkCustomer = DB::table('customers')
                ->where(['mobile'=>$request->mobile])
                ->get();
                
            if (isset($checkCustomer[0]) > 0) {
                // update cart 
                $uid = TempUserHelper::TempUser();

               $updateCart = DB::table('carts')
                ->where(['user_id'=>$uid,'user_type'=>'not-regi'])
                ->update(
                    [
                        'user_id'=>$checkCustomer[0]->id,
                        'user_type'=>'regi',
                    ]
                );

              $request->session()->put('regi_user_true',true);
              $request->session()->put('regi_user_login',$checkCustomer[0]->id);
              $request->session()->put('regi_name',$checkCustomer[0]->name);
              $request->session()->put('regi_image',$checkCustomer[0]->image);
              $request->session()->put('regi_mobile',$checkCustomer[0]->mobile);
              $dbPassword = Crypt::decrypt($checkCustomer[0]->password);
            if ($dbPassword !== $request->post('password')) {
                return response()->json(['status'=>'warning','msg'=>'Password is Wrong']);
            }
            return response()->json(['status'=>'success']);
            }else{
                return response()->json(['status'=>'warning','msg'=>'mobile number is not match to record']);
                // print_r($checkCustomer);exit;
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Order()
    {
        if (session()->exists('regi_user_true')) {
            $customerId = session()->get('regi_user_login');
            $result['orders'] = DB::table('orders')
                ->where(['customer_id'=>$customerId])
                ->get();

                // echo "<pre>";
                // print_r($result['orders']);exit;
            return view('frontend/pages/customer/order',$result);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function CustomerOrderDetail(Request $request, $order_id,$customer_id)
    {
        if (session()->exists('regi_user_true')) {

        $result['customer_order_detail'] =  DB::table('order_details')
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

            return view('frontend/pages/customer/customer-order-detail',$result);
            
            }else{
            return redirect()->route('home');
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

            // echo "<pre>";
            // print_r($result);exit;
            return redirect()->route('customer.all.order')->with('danger','Order Deleted Successfull ');
    }

    public function genaratePdf(Request $request, $order_id,$customer_id){
       if (session()->exists('regi_user_true')) {

        $order['orders'] =  DB::table('order_details')
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

            $pdf = PDF::loadView('frontend.pages.pdf',$order);
            return $pdf->download('frontend.pages.pdf.pdf');

           
            }else{
            return redirect()->route('home');
        }
        
    }

}
