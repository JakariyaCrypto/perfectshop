<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\TempUserHelper;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [
            'frontend/includes/partials/header','frontend/pages/checkout',

            ], function ($view) {
               
               // get cart product after page reload
        if (session()->has('regi_user_login')) {

                $uid =session()->get('regi_user_login');
                $user_type = "regi";

            }else{
                $uid = TempUserHelper::TempUser();
                $user_type = "not-regi";
            }

            // when load the page 
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

                $rowCount = count($cart_products);



               $cats = DB::table('categories')
                    ->where(['status'=>'active'])
                    ->get();
                
                
             $view->with([
                'cart_products'=>$cart_products, 
                'row_count'=> $rowCount,
                'cats'=>$cats,
            ]);
         });


    }
}
