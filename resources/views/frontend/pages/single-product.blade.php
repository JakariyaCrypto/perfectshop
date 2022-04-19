@extends('frontend/master')
@section('title','PERFECTALL/Single-product')

@section('content')

<!-- single prosuct -->
    <div class="single-product">
        <div class="container bg-white">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-5 col-xl-5 py-2">
                  <div class="single-image" id="color_by_img">

                    <div class="single-image-item">
                      <img src="{{asset($single_product[0]->image)}}" alt="" srcset="">
                    </div>
<!--                     <div class="single-image-item">
                      <img src="assets/img/p-3.png" alt="" srcset="">
                    </div>
                    <div class="single-image-item">
                      <img src="assets/img/p-5.jpg" alt="" srcset="">
                    </div>
                    <div class="single-image-item">
                      <img src="assets/img/p-8.png" alt="" srcset="">
                    </div>
                    <div class="single-image-item">
                      <img src="assets/img/p-7.png" alt="" srcset="">
                    </div>
                    <div class="single-image-item">
                      <img src="assets/img/p-6.jpg" alt="" srcset="">
                    </div> -->
                  </div>

                  <!-- <div class="multi-image">
                    <div class="multi-image-item">
                      <img src="assets/img/p-4.png" alt="" srcset="">
                    </div>
                    <div class="multi-image-item">
                      <img src="assets/img/p-3.png" alt="" srcset="">
                    </div>
                    <div class="multi-image-item">
                      <img src="assets/img/p-5.jpg" alt="" srcset="">
                    </div>
                    <div class="multi-image-item">
                      <img src="assets/img/p-8.png" alt="" srcset="">
                    </div>
                    <div class="multi-image-item">
                      <img src="assets/img/p-7.png" alt="" srcset="">
                    </div>
                    <div class="multi-image-item">
                      <img src="assets/img/p-6.jpg" alt="" srcset="">
                    </div>
                  </div> -->
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                  <div class="single-pro-info">
                    <h3>{{$single_product[0]->name}}</h3>
                    <div class="mb-2">
                      <del>{{$single_product[0]->price}} tk</del><span class="single-price"> {{$single_product[0]->mrp}} tk</span>
                    </div>
                    <h6><span>Category: <strong> <a href="#">{!!$product_cat[$single_product[0]->cat_id][0]->category!!}</a></strong></span></h6>
                    <h6><span>Brand: <strong> <a href="#">{!!$pro_barand[$single_product[0]->brand_id][0]->name !!}</a></strong></span></h6>
                    <h6><span style="text-transform: capitalize;">Warranty: <strong> {{$single_product[0]->warranty}}</strong></span></h6>

                    <hr/>
                   <!--  <div class="social-info ">
                      <span>Share to social</span>
                      <ul>
                        <li><a href="#"><i class="fab fa-facebook"></i> </a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></i></li>
                      </ul>
                    </div> --> 
                    <div class="color-size">
                    	<div class="single-product-size">
		                     @php
		                    	$arr_size=[];
		                        foreach($product_attrs[$single_product[0]->id] as $size)
		                          {
		                            $arr_size[] = $size->size;
		                          }

		                          $arr_size = array_unique($arr_size);

		                      @endphp

	                    	@if($product_attrs[$single_product[0]->id][0]->attr_size > 0)
	                    		<span>Choose Size: </span>
	                    		@foreach($arr_size as $size)
	                    			@if($size !== '')
	                    			<a href="javascript:void(0)" class="product_attr_size size_border_hide"
	                    				onclick="show_color('{{$size}}')" 
	                    				id="size_{{$size}}" 
	                    			>
	                    			{{$size}}
	                    		</a>
	                    			@endif
	                    		@endforeach

	                    	@endif
                    	</div>


                    	<div class="single-product-color">


	                    	@if($product_attrs[$single_product[0]->id][0]->attr_color > 0)
	                    		<span>Choose Color: </span>
	                    		@foreach($product_attrs[$single_product[0]->id] as $list)

	                    			@if($list->color != '')
	                    		<a style="background: {{strtolower($list->color)}};" class="product_attr_color color_border_hide size_{{$list->size}} color_{{$list->color}}" id="" href="javascript:void(0)"
	                    			onclick=onclick=chage_product_color_image("{{asset($list->attr_image)}}","{{$list->color}}") 
	                    		>
	                    		
	                    		</a>

	                    			@endif
	                    		@endforeach
                          <?php
                            // echo "<pre>";
                            // print_r($product_attrs);exit;
                          ?>
	                    	@endif
                    	</div>
                    </div>

                    <hr>
                    <div class="qty">
                      <div class="form-gropup">
                        <label for="">Select Quantity: </label>
                        <input type="number" class="form-control custom-qty" name="qty" id="qty" value="1" min="1">
                      </div>
                    </div>
                </div>
                <div class="single-pro-btn mt-5" id="add_to_cart">
                  <a class="btn single-btn-cart waiting_msg" href="javascript:void(0)"
                  	onclick="add_to_cart('{{$single_product[0]->id}}','{{$product_attrs[$single_product[0]->id][0]->attr_color}}','{{$product_attrs[$single_product[0]->id][0]->attr_size}}')"

                  >
                 	 Add to cart
              		</a>
                  <!-- <button class="btn single-btn-order ">order now</button> -->
                  <!-- <button class="btn single-btn-wish similar-btn-2">wish list</button> -->
                  <!-- hidden value passes form -->
                  <form method="post" id="addToCartForm">
                    <input type="hidden" name="size_id" id="size_id">
                    <input type="hidden" name="color_id" id="color_id">
                    <input type="hidden" name="pqty" id="pqty">
                    <input type="hidden" name="product_id" id="product_id">
                    @csrf
                  </form>
                  <!-- hidden value passes form -->

                </div>
                <!-- display size and color not choose message -->
                <div class="mt-3">
                  <span id="add_to_card_msg" class="success_msg"></span>
                </div>
                <!-- display size and color not choose message -->
                </div>
                <div class="col-sm-8 col-md-4 col-lg-3 col-xl-3 m-auto">
                  <div class="single-left-side">
                    <div class="single-left-title py-2">
                      <span>Delivery info</span>
                    </div>
                    <div class="single-left-item">
                      <ul>
                        <li><i class="fa fa-truck" aria-hidden="true"></i></li>
                        <li><span>Dhaka, Dhaka North, Banani Road No. 12 - 19</span></li>
                        <li><span class="item-left">Extra change out of Dhaka</span></li>
                      </ul>
                      </div>
                      <div class="single-left-item">
                        <ul>
                          <li><i class="fa fa-wallet" aria-hidden="true"></i></li>
                          <li><span>Cash on Delivery</span></li>
                          <li><div class="item-left">Avaiable</div> </li>
                        </ul>
                        </div>
                        <div class="single-left-item">
                          <ul>
                            <li><i class="fa fa-hand-lizard" aria-hidden="true"></i></li>
                            <li>
                              <span>Home Delivery</span>
                              <h6>4-7 days</h6>
                            </li>
                            <li><span class="item-left">৳ ৩০</span></li>
                          </ul>
                        </div>
                    </div>
                    <div class="single-left-service">
                      <div class="single-left-service-item">
                        <ul>
                          <li><i class="fa fa-hand-lizard" aria-hidden="true"></i></li>
                          <li>
                            <span>7 days return </span>
                            <h6>only warranty product</h6>
                          </li>
                        </ul>
                      </div>
                      <div class="single-left-service-item">
                        <ul>
                          <li><i class="fa fa-hand-lizard" aria-hidden="true"></i></li>
                          <li>
                            <span>Service 7/30 days</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                </div> 
              </div> <hr>

              <div class="row" style="background-color: #fbfbfb;">
                  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="single-detail-content">
                      <div class="imgage">
                        <img src="{{asset('frontend/assets/img/resize-logo-PhotoRoom.png')}}" alt="" srcset="">
                      </div>
                      <div class="detail-text">
                        <p>{!! $single_product[0]->description !!}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="single-popular-pro">
                      <div class="populat-title mt-2 py-3"><h5>Related products</h5></div>
                      @if($related_products)
                     
                      @foreach($related_products as $product)
                      <div class="single-popurlar-item">
                        <div class="img">
                          <img src="{{asset($product->image)}}" alt="">
                        </div>
                        <div class="single-popular-content">
                          <h6><a style="text-decoration:none; color: #535353" href="{{url('single-product')}}/{{$product->slug}}">{{$product->name}}</a></h6>
                          <div class="popular-price">
                            <del style="color:orange">{{$product->price}} ৳</del> <span>{{$product->mrp}} ৳</span>
                          </div>
                          <div class="popular-cart-btn">
                            <a href="javascript:void(0)" class="similar-btn-2"
                              onclick="home_add_to_cart('{{$product->id}}','{{$related_products_attrs[$product->id][0]->size}}','{{$related_products_attrs[$product->id][0]->color}}')"
                            >
                            Add cart
                          </a>
                          </div>
                        </div>
                      </div>
                       @endforeach
                       @else
                       <div class="relative-pro-not-fond">
                         <h5>Related product not found</h5>
                       </div>
                       @endif
                      </div>

                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
<!-- single prosuct -->



<style type="text/css">

.product_attr_color {
  text-decoration: none;
  margin: 5px;
  padding: 10px;
  display: inline-table;
}

.single-product-color {
	margin-bottom: 20px;
}

.product_attr_size {
  background: #ddd;
  padding: 5px;
  border-radius: .1rem;
  text-decoration: none;
  color: #535353;
  text-transform: lowercase;
  margin: 5px;
  margin-bottom: 20px;
}

.custom-qty {

	width: 18% ;

}

.single-btn-cart {
  text-decoration: none !important;
}
.single-product-size {
  margin-bottom: 20px;
}

</style>



@endsection