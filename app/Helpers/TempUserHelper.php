<?php
namespace App\Helpers;
use DB;
class TempUserHelper{
	
	public function TempUser(){
		if (!session()->has('temp_user_id')) {
			
			$rand_id = rand(111111111,999999999);
			session()->put('temp_user_id',$rand_id);
			return $rand_id;

		}else{
			return session()->get('temp_user_id');
		}
	}

///
	public function cartProduct(){
		        // get cart product after page reload
        if (session()->has('regi_user_login')) {

                $uid =session()->get('regi_user_login');
                $user_type = "regi";

            }else{
                $uid = TempUser();
                $user_type = "not-regi";
            }

                
             $cart_products = DB::table('carts')
                ->leftJoin('products','products.id','=','carts.product_id')
                ->leftJoin('product_atts','product_atts.id','=','carts.product_attr_id')
                 ->leftJoin('colors','colors.id','=','product_atts.attr_color')
                ->leftJoin('sizes','sizes.id','=','product_atts.attr_size')
                ->where(['user_id'=>$uid])
                ->where(['user_type'=>$user_type])
                ->select(
                    'carts.qty','products.name','products.image','products.slug',
                    'products.id as pid','sizes.size','colors.color','product_atts.attr_mrp',
                    'product_atts.attr_image','product_atts.id as attr_id'
                )->get();

                return $cart_products;
	}

// order details


}



