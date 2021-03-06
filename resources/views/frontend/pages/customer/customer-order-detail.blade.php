@extends('frontend/master')
@section('title','PerfectDB/Order-detail')

@section('content')
<div class="product-cart-section my-3">
	<div class="product-cart-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="card order-cusotm-card">
						<div class="card-header">
							<h4>Customer Information</h4>
						</div>
						<div class="cart-body table-responsive">
							<table class="table-responsive table-hover table custom-table" style="width:100%">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Delivery Informaiton</th>
                    <th>Mobile</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$customer_order_detail[0]->name}}</td>
                    <td><strong>{{$customer_order_detail[0]->delivery_info}}</strong></td>
                    <td><h5 style="color:orange">{{$customer_order_detail[0]->mobile}}</h5></td>
                    <td><img style="width: 100px;height: auto" src="{{asset($customer_order_detail[0]->image)}}"></td>
                  </tr>
                </tbody>
              </table>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card order-cusotm-card">
						<div class="card-header">
							<h4>Payment Information</h4>
						</div>
						<div class="cart-body table-responsive">
							<table class="table-responsive table-hover table custom-table" style="width:100%">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$customer_order_detail[0]->id}}</td>
                    <td>{{$customer_order_detail[0]->payment_type}}</td>
                    <td><h5 style="color:orange">{{$customer_order_detail[0]->payment_status}}</h5></td>
                    <td><h4 class="badge badge-success text-info">{{$customer_order_detail[0]->order_status}}</h4></td>
                  </tr>
                </tbody>
              </table>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card order-cusotm-card">
						<div class="card-header">
							<h4>Product Information</h4>
						</div>
						<div class="cart-body table-responsive">
							<table class="table-responsive table-hover table custom-table" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Product Name</th>
                                    <th>Product</th>
                                    <th>size</th>
                                    <th>color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $total = 0;
                                  ?>
                                  @foreach($customer_order_detail as $product)
                                  <tr>
                                    <td>{{$product->pname}}</td>
                                    <td><img src="{{asset($product->attr_image)}}" style="width: 120px;height: 100px;"></td>
                                    <td>{{$product->size}}</td>
                                    <td>{{$product->color}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->qty}}</td>
                                    <td>
                                      
                                    <h6 style="color:orange;">
                                      {{
                                        $subTotal = $product->qty * $product->price; 

                                        }}

                                        ???
                                    </h6>
                                    </td>
                                    <?php
                                      $total = $total + $subTotal;

                                    ?>
                                  </tr>
                                  @endforeach
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td><h5>Total Amount:</h5></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> <h5>{{$total}}</h5> ???</td>
                                  </tr>
                                </tbody>
                              </table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<style type="text/css">
.order-cusotm-card {
	margin: 20px 0;
}
</style>

@endsection