@extends('frontend/master')
@section('title','PERFECTALL/Banner-Product')

@section('content')

<!-- latest product -->
<div class="latest-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12 py-5">
      	 
      </div>
    </div>
    <div class="row">
    @if(isset($banner_product[0]))
    @foreach($banner_product as $product)
      <div class="col-md-4 col-lg-3 col-sm-6 col-sx-6">
        <div class="product-item">
          <div class="product-img">
            <img src="{{asset($product->image)}}" alt="" srcset="">
          </div>
          <div class="product-content">
            <h5>{{$product->name}}</h5>
            <del>
            	@if($product->price !== null)
            		{{$product->price}}tk
            	@else
            	<!-- display empty -->
            	@endif
            	
            </del> 
            <span>
            	@if($product->mrp !== null)
            		{{$product->mrp}} tk
            	@else
            	<!-- display empty -->
            	@endif
            	
            </span>
          </div>
          <div class="hover-content">
            <div class="hover-icon">
              <a href="javascript:void(0)"
              onclick="home_add_to_cart('{{$product->id}}','{{$product_attrs[$product->id][0]->size}}','{{$product_attrs[$product->id][0]->color}}')"
              >
                <i class="fa-solid fa fa-shopping-cart" aria-hidden="true"></i>
              </a>
            </div>
            <div class="hover-icon">
              <a href="{{url('single-product')}}/{{$product->slug}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    @else
    <div class="col-sm-12 text-center pb-3">
    	<h4>Product is  not Found</h4>
    </div>
    @endif
    </div>
    </div>
  </div>
</div><!-- latest product -->

<!-- pass color and size id -->
    <input type="hidden" id="qty" name="qty" value="1">
    <form method="post" id="addToCartForm">
      <input type="hidden" id="size_id" name="size_id">
      <input type="hidden" id="color_id" name="color_id">
      <input type="hidden" id="pqty" name="pqty">
      <input type="hidden" id="product_id" name="product_id">
      @csrf
    </form>
<!-- pass color and size id -->
@endsection