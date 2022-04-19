<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\backend\pages\DashboardController;
use App\Http\Controllers\backend\pages\BrandController;
use App\Http\Controllers\backend\pages\SizeController;
use App\Http\Controllers\backend\pages\ColorController;
use App\Http\Controllers\backend\pages\SliderController;
use App\Http\Controllers\backend\pages\BannerController;
use App\Http\Controllers\backend\pages\CategoryController;
use App\Http\Controllers\backend\pages\ProductController;
use App\Http\Controllers\backend\pages\OrderController;
// auth controller
use App\Http\Controllers\backend\auth\AdminController;
use App\Http\Controllers\backend\auth\GenreralAdminController;
use App\Http\Controllers\backend\auth\developerController;
// frontend controllers  
use App\Http\Controllers\frontend\pages\HomeController;
use App\Http\Controllers\frontend\pages\SingleProduct;
use App\Http\Controllers\frontend\pages\CustomerController;
use App\Http\Controllers\frontend\pages\CheckoutController;
use App\Http\Controllers\frontend\pages\ContactController;
/*
|--------------------------------------------------------------------------
| Web RouteServiceProvider Customer 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ************************************ admin routes *************************

Route::get('/welcome',function(){
	return view('welcome');
});
	
		// auth routes
	Route::post('/admin/check-login',[AdminController::class, 'login'])->name('check.login');
	Route::get('/admin/logout',[AdminController::class, 'logout']);

		
	// Route::group(['middleware'=>['adminCheck']], function(){
	// });
		Route::get('/admin/login',[AdminController::class, 'index'])->name('admin.login');
		Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

		

	
	Route::get('/general-admin/dashboard', [GenreralAdminController::class, 'index'])->name('general-admin.dashboard');
	Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
	Route::get('/developer/dashboard', [developerController::class, 'index'])->name('developer.dashboard');

	// category routes
	Route::get('/dashboard/category',[CategoryController::class, 'index']);
	Route::post('/dashboard/category/store',[CategoryController::class,'store']);
	Route::get('/dashboard/category/shows',[CategoryController::class,'show']);
	Route::get('/dashboard/edit/category/{id}',[CategoryController::class,'edit']);
	Route::post('/dashboard/category/update/{id}',[CategoryController::class,'update']);
	Route::get('/dashboard/view/category/{id}',[CategoryController::class,'view']);
	Route::get('/dashboard/del/category/{id}',[CategoryController::class,'destroy']);
	Route::get('/dashboard/inactive/category/{id}',[CategoryController::class,'inactive']);
	Route::get('/dashboard/active/category/{id}',[CategoryController::class,'active']);



	// brand routes
	Route::get('/dashboard/brand',[BrandController::class, 'index']);
	Route::post('/dashboard/brand/store',[BrandController::class,'store']);
	Route::get('/dashboard/brand/shows',[BrandController::class,'show']);
	Route::get('/dashboard/edit/brand/{id}',[BrandController::class,'edit']);
	Route::post('/dashboard/brand/update/{id}',[BrandController::class,'update']);
	Route::get('/dashboard/view/brand/{id}',[BrandController::class,'view']);
	Route::get('/dashboard/del/brand/{id}',[BrandController::class,'destroy']);
	Route::get('/dashboard/inactive/brand/{id}',[BrandController::class,'inactive']);
	Route::get('/dashboard/active/brand/{id}',[BrandController::class,'active']);

	// Size routes
	Route::get('/dashboard/size',[SizeController::class, 'index']);
	Route::post('/dashboard/size/store',[SizeController::class,'store']);
	Route::get('/dashboard/size/shows',[SizeController::class,'show']);
	Route::get('/dashboard/edit/size/{id}',[SizeController::class,'edit']);
	Route::post('/dashboard/size/update/{id}',[SizeController::class,'update']);
	Route::get('/dashboard/view/size/{id}',[SizeController::class,'view']);
	Route::get('/dashboard/del/size/{id}',[SizeController::class,'destroy']);
	Route::get('/dashboard/inactive/size/{id}',[SizeController::class,'inactive']);
	Route::get('/dashboard/active/size/{id}',[SizeController::class,'active']);

	// color routes
	Route::get('/dashboard/color',[ColorController::class, 'index']);
	Route::post('/dashboard/color/store',[ColorController::class,'store']);
	Route::get('/dashboard/color/shows',[ColorController::class,'show']);
	Route::get('/dashboard/edit/color/{id}',[ColorController::class,'edit']);
	Route::post('/dashboard/color/update/{id}',[ColorController::class,'update']);
	Route::get('/dashboard/view/color/{id}',[ColorController::class,'view']);
	Route::get('/dashboard/del/color/{id}',[ColorController::class,'destroy']);
	Route::get('/dashboard/inactive/color/{id}',[ColorController::class,'inactive']);
	Route::get('/dashboard/active/color/{id}',[ColorController::class,'active']);


	// slider routes
	Route::get('/dashboard/slider',[SliderController::class, 'index']);
	Route::post('/dashboard/slider/store',[SliderController::class,'store']);
	Route::get('/dashboard/slider/shows',[SliderController::class,'show']);
	Route::get('/dashboard/edit/slider/{id}',[SliderController::class,'edit']);
	Route::post('/dashboard/slider/update/{id}',[SliderController::class,'update']);
	Route::get('/dashboard/view/slider/{id}',[SliderController::class,'view']);
	Route::get('/dashboard/del/slider/{id}',[SliderController::class,'destroy']);
	Route::get('/dashboard/inactive/slider/{id}',[SliderController::class,'inactive']);
	Route::get('/dashboard/active/slider/{id}',[SliderController::class,'active']);

	// banner routes
	Route::get('/dashboard/banner',[BannerController::class, 'index']);
	Route::post('/dashboard/banner/store',[BannerController::class,'store']);
	Route::get('/dashboard/banner/shows',[BannerController::class,'show']);
	Route::get('/dashboard/edit/banner/{id}',[BannerController::class,'edit']);
	Route::post('/dashboard/banner/update/{id}',[BannerController::class,'update']);
	Route::get('/dashboard/view/banner/{id}',[BannerController::class,'view']);
	Route::get('/dashboard/del/banner/{id}',[BannerController::class,'destroy']);
	Route::get('/dashboard/inactive/banner/{id}',[BannerController::class,'inactive']);
	Route::get('/dashboard/active/banner/{id}',[BannerController::class,'active']);

	// product routes
	Route::get('/dashboard/add-product',[ProductController::class, 'processProduct'])->name('add.product');
	Route::get('/dashboard/add-product/{id}',[ProductController::class, 'processProduct']);
	Route::get('/dashboard/manage-product',[ProductController::class, 'manage'])->name('manage.product');
	Route::post('dashboard/product-store',[ProductController::class, 'store'])->name('product.store');
	Route::get('dashboard/product/attribute/delete/{paid}/{pid}',[ProductController::class, 'ProductAttrDelete']);
	Route::get('dashboard/product/delete/{pid}',[ProductController::class,'destroy']);
	Route::get('dashboard/product/view-product/{pid}',[ProductController::class,'viewProduct'])->name('view.product');
	Route::get('/delete-product-attributes/{attr_id}/{pid}',[ProductController::class,'deleteProductAttributes']);
	Route::get('/inactive-status/{id}',[ProductController::class,'productInactive']);
	Route::get('/active-status/{id}',[ProductController::class,'productActive']);


	// orders 
	Route::get('/dashboard-orders',[OrderController::class,'index'])->name('all.order');
	Route::get('/dashboard/order-detail/{order_id}/{customer_id}',[OrderController::class,'orderDetail']);
	Route::post('/update/order-status',[OrderController::class,'updateOrderStatus']);
	Route::get('dashboard/order/delete/{id}',[OrderController::class,'destroy']);

	
// ************************************ admin routes *************************




// ************************************ frontend roures *************************

	// home page
	Route::get('/',[HomeController::class ,'homePage'])->name('home');
	// search product
	Route::get('/search/{str}',[HomeController::class, 'productSearch']);
	// slider product
	Route::get('/slider-product/{id}',[HomeController::class, 'sliderProduct']);
	// category product
	Route::get('/category-product/{id}',[HomeController::class, 'categoryProduct']);
	// banner product
	Route::get('/banner-product/{id}',[HomeController::class, 'bannerProduct']);
	// single product
	Route::get('/single-product/{slug}',[SingleProduct::class ,'sigleProduct']);
	Route::post('/addto-cart',[SingleProduct::class ,'addToCart']);
	Route::get('/cart-product',[SingleProduct::class, 'cartPageProduct'])->name('cart');

	// customer
	Route::get('/registration',[CustomerController::class,'index'])->name('registration');
	Route::post('/customer/registration',[CustomerController::class,'Registraion']);
	Route::post('/customer/login',[CustomerController::class,'Login']);

	Route::get('logout',function(){
        session()->forget('regi_user_true');
        session()->forget('regi_user_login');
        session()->forget('regi_name');
        session()->forget('regi_image');
        session()->forget('regi_mobile');
        return redirect('/');

    });
    // checkout routes
	Route::get('/checkout',[CheckoutController::class,'index']);
	Route::post('/conform/order',[CheckoutController::class,'ConformOrder']);
	Route::get('/order-success',[CheckoutController::class,'OrderSuccess']);
	Route::get('/customer/orders',[CustomerController::class,'Order'])->name('customer.all.order');
	Route::get('/customer/order-detail/{order_id}/{customer_id}',[CustomerController::class,'CustomerOrderDetail']);

	Route::get('/customer/order/delete/{id}',[CustomerController::class,'destroy']);
	Route::get('/customer/download-slip/{order_id}/{customer_id}',[CustomerController::class,'genaratePdf']);
	// static pages
	Route::get('/contact-us',[ContactController::class,'index']);
	Route::get('/term&condition',[ContactController::class,'aboutPage']);
	Route::post('/contact-store',[ContactController::class,'store']);

// ************************************ frontend roures *************************

