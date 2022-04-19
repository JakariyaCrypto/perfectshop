<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" name="csrf-token" content="csrt_token">
    <link rel="icon" type="image/icon" href="{{asset('frontend/assets/img/resize-logo-PhotoRoom.png')}}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('frontend/assets/fontawesome-6.0.0/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/glyphicon.min.css')}}">
    <!-- fontawesome -->
    <!-- Bootstrap CSS -->
    <link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    
    <!-- slick slider css -->
    <link href="{{asset('frontend/assets/css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/slick-theme.css')}}" rel="stylesheet">
    <!-- slick slider css -->
    <!-- custom CSS -->
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet" >
    <!-- custom CSS -->
    <!-- responsive CSS -->
    <link href="{{asset('frontend/assets/css/mobile-responsive.css')}}" rel="stylesheet" >
    <!-- responsive CSS -->
    <!-- custom CSS -->
    <link href="{{asset('frontend/assets/css/swiper-bundle.min.css')}}" rel="stylesheet" >
    <!-- custom CSS -->
    <title>@yield('title')</title>
    <script type="text/javascript">
    const session_id = '{{session()->get('regi_name')}}';
    // alert(session_id);
</script>
  </head>
  <body>
    
    <!-- header section -->
    <div class="header-section" id="desktop-nav">
      <div class="header-top py-2">
        <div class="container">
          <div class="row">
            <div class="col-md-5 col-sm-6">
              <div class="header-welcome">
                <span class="welcome-msg mr-2 text-upper">Welcome to PerfectDB</span>
                
                <span><a style="text-decoration: none;color:orange;" href="{{url('/registration')}}" class="sing-in">Singin</a></span>
                <span class="text text-white">Or</span>
                 @if(session()->exists('regi_user_true'))
                   <span><a href="{{url('/logout')}}" class="log-in mr-2">Logout</a></span>
                 @else
                  <span><button href="" data-toggle="modal" data-target="#loginModal" class="log-in mr-2">Login</button></span>
                 @endif
              </div>
              <!-- <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#regiMoal">
                Launch demo modal loginModal
              </button> -->
            </div>
            <div class="col-md-3 col-sm-6 header-menu-cart-border-left" id="profile-icon">
              <div class="header-menu-cart">
                <div class="header-menu-cart-content">
                  <h6>  
                    
                    
                      @if(session()->exists('regi_user_true'))
                      <img src="{{asset('frontend/assets/img/profile-icon.png')}}" alt="">
                      <span>{{session()->get('regi_name')}}</span> <i class="fas fa-caret-down    "></i>
                      @else
                        <!-- not show prodile icon -->
                      @endif
                    
                  </h6>
                </div>
              </div>
              <div class="customer-drop-down">
                <div class="customer-doop-" id="profile-drop-down">
                  <ul>
                    <li><a href="#">Profile</a></li>
                    <li><a href="{{url('/customer/orders')}}">order</a></li>
                    <li><a href="#">change password</a></li>
                    <li><a href="#">logout</a></li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 ">
              <div class="header-top-social">
                <ul>
                  <li><a href=""><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href=""><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href=""><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                  <li><a href=""><i class="fab fa-linkedin" ></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="logo-header custom-border">
        <div class="container">
          <div class="row py-2 sticky-top d-flex justify-content-center align-items-center">
            <div class="col-md-4 col-lg-4">
              <div class="header-menu-info">
                <ul>
                  <li class="mr-2"><a href="tel:01771158098"> <i class="fa fa-phone" aria-hidden="true"></i> +8801314209321 </a></li>
                  <li><a href="mail:perfectbd@gmail.com"> <i class="fa fa-envelope-open" aria-hidden="true"></i> perfectallallxyz@gmail.com </a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="header-menu-logo">
                <a href="{{url('/')}}">
                  <img src="{{asset('frontend/assets/img/perfect-all-logo-fianl.png')}}" alt="" srcset="">
                </a>
                
                <h6 class="logo-text">Everything for online world</h6>
                <div onclick="searchProduct()" class="header-serch-icon desktop-none" id="mobile-serach-icon">
                <span> <i class="fas fa-search"> </i></span>
              </div>
              </div>

            </div>
            @if(session()->exists('regi_user_true'))
            <div class="col-md-2">
              <div class="header-menu-contruct">
                <span><i class="fa fa-shopping-cart"></i></span>
                <span>
                  <a href="{{url('/checkout')}}" class="header-mnu-contruct-btn text-white">Checkout</a>
                </span>
              </div>
            </div>
            @endif
            <div class="col-md-2 col-lg-2">
              <div class="header-menu-contruct">
                <span><i class="fa-solid fa-location-dot"></i></span>
                <span>
                  <a href="{{url('/contact-us')}}" class="header-mnu-contruct-btn text-white">Contact us</a>
                </span>
              </div>
            </div>
          </div>
          <!-- mobile seach form -->
          <div class="search-form desktop-none" id="mobile-serach-form">
            <form action="">
              <input type="text" id="search" name="search" placeholder="search favourtie product..">
            </form>
          </div> <!-- mobile seach form -->
        </div>
      </div>
      <div class="container">
        <div class="row py-4 text-center header-nav-row mobile-menu" id="show-mobile-menu">
          <div class="close-mobile-icon" id="close-mobile-menu-icon">
            <span><i class="fas fa-close"></i></span>
          </div>
          <div class="col-md-2 mobile-none"></div>
          <div class="col-md-8">
            <div class="header-menu">
              <nav class="heder-nav">
                <ul>
                  <li><a href="{{url('/')}}">Home</a></li>

                  <li class="mega-menu" id="click-mega-icon">

                    <a href="#" id="active-mega-menu-border">product</a>

                    <i class="fas fa-caret-down" id="megaIconRogate"></i>
                    <ul class="mega-menu-content" id="show-mega-content">
                      <div class="row">
                        @foreach($cats as $cat)
                        <div class="col-sm-sm-12 col-md-2 col-lg-2 col-xl-2">
                         <div class="mega-menu-item">
                            <li><a href="{{url('/category-product')}}/{{$cat->id}}">{{$cat->category}}</a></li>
                         </div>
                        </div>
                        @endforeach
  
                      </div>
                    </ul>
                  </li>

                  <li><a href="{{url('/contact-us')}}">Contruct us</a></li>
                  <li><a href="{{url('/term&condition')}}">Term & condition</a></li>

                </ul>
              </nav>
            </div>
          </div>
          <div class="col-md-2">
            <div onclick="searchProduct()" class="header-serch-icon mobile-none" id="search-icon">
              <span> <i class="fas fa-search"> </i></span>
            </div>
          </div>
          <div class="search-form mobile-none" id="search-form">
            <form action="">
              <input type="text" name="search" id="search" placeholder="search favourtie product..">
            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
    <!-- end header section -->





    <div class="mobile-cart">
  <!-- mobile menu-con -->
  <div class="mobile-menu-icon" id="">
    <div class="mobile-menu-icon-content" id="click-moblile-menu-icon">
      <span><i class="fas fa-bars"></i></span>
    </div>
  </div> <!-- mobile menu-con -->
  <!-- mobile use profile icon -->
<div class="mobile-profile-icon" id="mobile-profile-icon">
  <div class="mobile-profile-content">
    <span>
      <img src="{{asset('frontend/assets/img/profile-icon.png')}}" alt="">
      <i class="fas fa-caret-up"></i>
    </span>
  </div>
</div>
    @php
         $Total = 0;
         $sum = 0;
       @endphp
    @foreach($cart_products as $product)
        <!-- get cart icon total price -->
        @php
          $subTotal = $product->attr_mrp * $product->qty;
          $Total = $Total + $subTotal;
        @endphp
    @endforeach

  <div class="product-cart-icon" id="click-cart-icon">
  <div class="cart-icon-content">
    <div class="cart-icon">
      <span><i class="fas fa-shopping-basket"></i></span>
      @if($row_count == 0 || $row_count == 1)
      <span class="cart-icon-price cart_item">{{$row_count}} Item</span>
      @else
        <span class="cart-icon-price cart_item">{{$row_count}} Items</span>
      @endif
    </div>
   
    <div class="cart-icon-total">
      <span class="cart_total"> {{$Total}} tk</span>
    </div>
  </div>
</div>

</div>


<div class="product-cart" id="cart-product-show">
  <div class="product-cart-content">
    <div class="prouduct-cart-header">
      <div class="cart-header-content">
        <div class="cart-header-icon">
          <i class="fas fa-shopping-bag"></i> 
          @if($row_count == 0 || $row_count == 1)
          <span class="cart_item">{{$row_count}} item</span>
          @else
          <span class="cart_item">{{$row_count}} items</span>
          @endif
        </div>
        <div class="cart-header-close" id="hideCartProduct">
          <span>Close</span>
        </div>
      </div>
      <div class="cart-express">
        <span> <i class="fas fa-truck    "></i> <strong>Express Devlivery</strong></span>
      </div>
    </div>
    <div class="cart-body-content" id="product_cart_show">
      <div class="product-cart-body">
        <div class="cart-products">
          <div class="cart-qty">
            <span>Qty</span>
          </div>
          <div class="cart-product-image">
            <span>Image</span>
          </div>
          <div class="cart-product-title"><span>Name</span></div>
          <div class="cart-product-price">

            <span>Sub total </span>
          </div>
        </div>

        @foreach($cart_products as $product)
        <div class="cart-products" id="cart_item{{$product->attr_id}}">
          <div class="cart-qty">
            <span>{{$product->attr_mrp }} *  {{$product->qty}}</span>
          </div>
          <div class="cart-product-image">
            <img src="{{asset($product->attr_image)}}" alt="" srcset="">
          </div>
          <div class="cart-product-title"><span>{{$product->name}}</span></div>
          <div class="cart-product-price">
            <?php

               $Total = ($product->attr_mrp * $product->qty);
                $sum = $sum + $Total;

            ?>

            <span> {{$Total}} tk </span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="product-cart-footer reloaded">
        <div class="cart-order-btn">
          @if($row_count == 0)
            <!-- not show order button   -->
          @else
            <a href="{{url('/cart-product')}}" class="similar-btn-2 cart-order-btn">Check Cart</a>
          @endif
          <span class="cart-total-price">{{$sum}} tk</span>
        </div>
      </div>
  </div>
</div>



