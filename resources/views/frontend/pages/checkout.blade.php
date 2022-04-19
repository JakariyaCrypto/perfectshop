@extends('frontend/master')
@section('title','PerfectBD/Checkout')

@section('content')
<!-- order info -->

@if(session()->exists('regi_user_true'))
<div class="order-info">
	<form method="post" id="CheckoutForm">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-6">
	                <div class="order-prview">
	                    <div class="card product-overview">
	                        <div class="card-header" style="background:orange">
	                            <h5><i class="fa-brands fa-first-order"></i> Order Detail</h5>
	                        </div>
	                        <table class="table table-hover p-3">
	                        	<thead class="border-0">
	                        		<tr>
	                        			<th>Name</th>
	                        			<th>Color</th>
	                        			<th>Size</th>
	                        			<th>Image</th>
	                        			<th>Qty</th>
	                        			<th>sub-total</th>
	                        		</tr>
	                        	</thead>
	                            <tbody>
	                            	<?php
	                            		$Total = 0;
	                            		$sum = 0;
	                            	?>
	                            	@foreach($cart_products as $product)
	                               <tr>
		                                <td><span>{{$product->name}}</span></td>
		                                <td><span>{{$product->color}}</span></td>
		                                <td><span>{{$product->size}}</span></td>
		                                <td style="width:100px;height:60px;"><span><img src="{{asset($product->attr_image)}}" alt=""></span></td>
		                                <td><span>{{$product->qty}}</span></td>
		                                 <?php

							               $Total = ($product->attr_mrp * $product->qty);
							                $sum = $sum + $Total;
							                $mobile = session()->get('regi_mobile');

							            ?>

		                                <td><span>{{$Total}} ট</span></td>
	                               </tr>
	                               @endforeach
	                               <tr>
	                               		
	                               		<td><h5>Total Price:</h5></td>
	                               		<td></td>
	                               		<td></td>
	                               		<td></td>
	                               		<td><h5><strong>{{$sum}}</strong></h5></td>
	                               		<td><h5><strong>ট</strong></h5></td>
	                               </tr>
	                            </tbody>
	                        </table>
	                    </div>
	                    <div class="card payment-method mt-2">
	                        <div class="card-header">
	                            <h5>Payment Method</h5>
	                        </div>
	                        <div id="pay_warning" class="my-3"></div>
	                        <div class="all-payment-method" style="cursor:pointer;">
	                        	<input type="hidden" name="cod" value="" id="cod_pay_method">
	                            <a href="javascript:void(0)" onclick="select_pay_method('{{$mobile}}')">
	                            	<img id="border_image" src="{{asset('frontend/assets/img/p-cod-PhotoRoom.png')}}" alt="">
	                            </a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-6">
	                <div class="order-info-form">
	                    <div class="card order-card">
	                        <div class="card-header" style="background-color: orange;">
	                            <h5>Delivery information</h5>
	                        </div>
	                        <div class="modal-body">
	                            <div class="row auth-content">
	                                <div class="col-sm-12">
	                                    <div class="customer-auth">
	                                        <div class="customer-auth-form">
	                                        	<?php
	                                        		$name = session()->get('regi_name');
	                                        		$mobile = session()->get('regi_mobile');

	                                        	?>
	                                            <div class="form-group">
	                                                <label for="">User Name <span class="star">*</span></label>
	                                                <input type="text" class="form-control" name="name" id="" placeholder="full name" required value="{{$name}}">
	                                                <div class="mt-2" id="name_error"></div>
	                                            </div>
	                                            <div class="form-group">
	                                                <label for="">Mobile <span class="star">* </span></label>
	                                                <input type="text" class="form-control" name="mobile" id=""  placeholder="mobile number" required value="{{$mobile}}">
	                                                <div class="mt-2" id="mobile_error"></div>

	                                            </div>
	                                            <div class="form-group">
	                                                <label for="">Delivery Location <span class="star">* </span></label>
	                                                <textarea class="form-control" rows="3" name="delivery_info"></textarea>
	                                                <div class="mt-2" id="delivery_info_error"></div>

	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	            </div>
	            <div class="row py-3">
	                <div class="col-sm-6">
	                    <div class="back-shoping">
	                        <a href="#" class="similar-btn-2"> <i class="fas fa-arrow-left"></i> Back to Shoping</a>
	                    </div>
	                    
	                </div>
	                <div class="col-sm-6">
	                    <div class="order-now">
	                        <button type="submit" class="single-btn-order border-0 order-waiting"> Order Now <i class="fas fa-arrow-right"></i></button>
	                    </div>
	                </div>
	            </div>
	            @csrf
        	</form>
        </div>
    </div>
</div>

<style type="text/css">
.card.product-overview table td {
	background: ;
	margin-top: ;
	line-height: 39px;
}
.all-payment-method {
	text-align: center;
}



</style>
@endif
<!-- order info -->
@endsection
