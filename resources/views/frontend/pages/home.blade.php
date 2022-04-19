@extends('frontend/master')
@section('title','PERFECTALL')

@section('content')
<!-- slider section -->
<section class="slider-section">
  <div class="slider-content">
      <div class="slider-item slider-id">
          <div class="swiper-wrapper"> 
            <!--- slider-1-->
            @foreach($sliders as $slider)
              <div class="swiper-slide"> 
                  <img src="{{asset($slider->image)}}" alt="">
                  <div class="slide-item-content">
                      <h1>
                      	@if($slider->title !== null)
                      		<span>{{$slider->title}}</span>
                      	@else
                      		<!-- empty -->
                      	@endif

                      	@if($slider->price !== null)
                      		<span>{{$slider->price}} Tk</span>
                      	@else
                      		<!-- empty -->
                      	@endif
                      </h1>

                      	@if($slider->short_desc !== null)
                      		<p>{{$slider->short_desc}}</p>
                      	@else
                      		<!-- empty -->
                      	@endif

                      	@if($slider->btn_name !== null)
                      		<a href="{{url('/slider-product/')}}/{{$slider->id}}" class="similar-btn">{{$slider->btn_name}}</a>
                      	@else
                      		<!-- empty -->
                      	@endif
                      
                      
                  </div>
              </div> <!--- slider-1-->

            @endforeach
          </div> 
      </div>
  </div>
</section>
<!-- slider section -->

<!-- category section -->
<div class="category-section my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-tile">
          <h2> our category </h2>
        </div>
      </div>
    </div>
    <div class="row">
    	@foreach($categories as $category)
      <div class="col-md-3 col-sm-4 col-lg-2 col-xl-2 col-xs-6">
        <div class="category-item">
          <div class="category-item-img">
            <img src="{{asset($category->image)}}" alt="" srcset="">
          </div>
          <div class="category-content">
            <h6><a href="{{url('/category-product')}}/{{$category->id}}">{{$category->category}}</a></h6>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- category section -->

<!-- banner section -->
<div class="banner-section my-5">
  <div class="container">
  	@foreach($banners as $banner)
    <div class="row banner-area">
      <div class="col-md-7 col-sm-6">
        <div class="banner">
          <img src="{{asset($banner->image)}}" alt="" srcset="">
        </div>
      </div>
      <div class="col-md-5 col-sm-6">
        <div class="banner-content">
          <div class="banner-content-title">
            <h3 class="py-3 text-lg">{{$banner->title}}</h3>
          </div>
          <div class="content">
            <p>
               {{$banner->short_desc}}
            </p>
            <a href="{{url('/banner-product')}}/{{$banner->id}}" class="similar-btn-2"> {{$banner->btn_name}} </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div><!-- banner section -->

<!-- latest product -->
<div class="latest-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12 py-5">
        <div class="section-tile">
          <h2> latest products </h2>
        </div>
      </div>
    </div>
    <div class="row">
    @foreach($products as $product)
      <div class="col-md-4 col-lg-3 col-sm-6 col-sx-6">
        <div class="product-item">
          <div class="product-img">
            <img src="{{asset($product->image)}}" alt="" srcset="">
          </div>
          <div class="product-content">
            <h5> <a href="{{url('single-product')}}/{{$product->slug}}">{{$product->name}}</a></h5>
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
               onclick="home_add_to_cart('{{$product->id}}','{{$home_products_attrs[$product->id][0]->size}}','{{$home_products_attrs[$product->id][0]->color}}')"
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

<style type="text/css">
.single-popular-content a {
  text-decoration: none !important;
  color: #535353;
}

</style>
@endsection