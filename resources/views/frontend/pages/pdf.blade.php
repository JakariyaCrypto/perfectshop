
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>title</title>
</head>
<body>

<div class="product-cart-section my-3">
	<div class="product-cart-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="pdf-logo">
					</div>
					<div class="card order-cusotm-card">
						<div class="card-header">
							<h4 style="color:orange">Customer Information</h4>
						</div>
						<div class="cart-body table-responsive">
							<table class="table-responsive" style="width:100%;text-align: center;">
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
			                    <td>{{$orders[0]->name}}</td>
			                    <td>{{$orders[0]->delivery_info}}</td>
			                    <td>{{$orders[0]->mobile}}</td>
			                    <td>image</td>

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
                                  @foreach($orders as $product)
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

                                        ট
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
                                    <td> <h5>{{$total}}</h5> ট</td>
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
</body>
</html>

