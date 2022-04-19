@extends('frontend/master')
@section('title','PERFECTALL/Cart')

@section('content')

<div class="product-cart-section my-3">
	<div class="product-cart-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="cart_page_msg"></div>
					<div class="card table-responsive">
						<div class="card-header" style="background-color:orange">
							<h4>Product Cart</h4>
						</div>
						<div class="cart-body">
							<table class="table table-hover">
							  <thead>
							    <tr>
							      <th scope="col">Action</th>
							      <th scope="col">Product Name</th>
							      <th scope="col">color</th>
							      <th scope="col">size</th>
							      <th scope="col">Image</th>
							      <th scope="col">Quantity</th>
							      <th scope="col">Price</th>
							      <th scope="col">SubTotal</th>
							    </tr>
							  </thead>

							  <tbody>
							  	<?php
							  		$Total = 0;
							  		$sum = 0;
							  	?>
							  	@foreach($cart_produccts as $product)
							    <tr id="remove_cart_item{{$product->attr_id}}">
							      <th scope="row">
							      	<a href="javascript:void(0)" class="btn cart-del-btn btn-danger"
							      	onclick="del_cart_product('{{$product->pid}}','{{$product->color}}','{{$product->size}}','{{$product->attr_id}}')" 
							      	>
							      	<i class="fas fa-trash"></i></a></th>
							      <td>{{$product->name}}</td>
							      <td><img style="width:100px;height: 70px" src="{{asset($product->attr_image)}}"></td>
							      <td>{{$product->color}}</td>
							      <td>{{$product->size}}</td>
							      <td>
							      	<input style="width:50px" type="number" min="1" name="qty" value="{{$product->qty}}"
							      	onchange="updateQty('{{$product->pid}}','{{$product->size}}','{{$product->color}}','{{$product->attr_id}}','{{$product->attr_mrp}}')"
							      	id="qty{{$product->attr_id}}" 
							      	>
							      </td>
							      <td>{{$product->attr_mrp}}</td>
							       <?php

						               $Total = ($product->attr_mrp * $product->qty);
						                $sum = $sum + $Total;

						            ?>
						            <td id="row_total_price{{$product->attr_id}}">{{$Total}}</td>
							    </tr>
							    @endforeach
							    <tr>
							    	<td></td>
							    	<td></td>
							    	<td></td>
							    	<td></td>
							    	<td></td>
							    	<td><strong>Total</strong> :</td>
							    	<td></td>
							    	<td class="cart_total_price"><strong>{{$sum}} tk</strong></td>
							    </tr>

							  </tbody>
							</table>
						</div>
					</div>
					<div class="cart-button">
						<div class="back-shop-btn">

							<a href="{{url('/')}}" class="similar-btn-2 cart-order-btn"> <i class="fas fa-arrow-left"></i> Back shop</a>
						</div>
						@if(session()->exists('regi_user_login'))
						<div class="order-now-btn">
							<a href="{{url('/checkout')}}" class="similar-btn-2 cart-order-btn">Order Now
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
						@else
						<a href="{{url('/registration')}}" class="similar-btn-2 cart-order-btn">Order Now
							<i class="fas fa-arrow-right"></i>
						</a>

						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 <input type="hidden" name="qty" id="qty">

<!-- hidden value passes form -->
<form method="post" id="addToCartForm">
  <input type="hidden" name="size_id" id="size_id">
  <input type="hidden" name="color_id" id="color_id">
  <input type="hidden" id="pqty" name="pqty">
  <input type="hidden" name="product_id" id="product_id">
  @csrf
</form>
<!-- hidden value passes form -->



<style type="text/css">

.product-cart-content {
	margin: 50px auto;
}
.cart-button {
	display: flex;
	justify-content: space-around;
	margin-top: 50px;
}

.cart-del-btn {
	box-shadow: 0px 0px 3px 4px rgba(230, 125, 13, 0.1);
}

.back-shop-btn i.fas.fa-arrow-left {
	color: #535353;
	margin-right: 10px;
}

.order-now-btn i.fas.fa-arrow-right {
	color: #535353;
	margin-left: 10px;
}
</style>

@endsection