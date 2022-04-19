      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" name="csrf-token" content="{{csrf_token()}}">
   <link rel="icon" href="{{asset('backend/assets/img/resize-logo-PhotoRoom.png')}}" type="image/ico" />
  

    <title>@yield('title')</title>

   <!-- Bootstrap -->
    <link href="{{asset('backend/assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('backend/assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->

    <link href="{{asset('backend/assets/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  
    <link href="{{asset('backend/assets/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
     <!-- ckeditor -->
    <link type="text/css" href="{{asset('backend/assets/ckeditor5/sample/css/sample.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <!-- Custom Theme Style -->
    <link href="{{asset('backend/assets/build/css/custom.min.css')}}" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('admin.dashboard')}}" class="site_title"><img src="{{asset('backend/assets/img/resize-logo-PhotoRoom.png')}}"> </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{url('/dashboard/category')}}"><i class="fa fa-home"></i> Category </a></li>
                  <li><a href="{{url('/dashboard/slider')}}"><i class="fa fa-home"></i> Slider </a></li>
                  <li><a href="{{url('/dashboard/banner')}}"><i class="fa fa-home"></i> Banner </a></li>
                  <li><a href="{{url('/dashboard/brand')}}"><i class="fa fa-home"></i> Brand </a></li>
                  <li><a href="{{url('/dashboard/size')}}"><i class="fa fa-home"></i> Size </a></li>
                  <li><a href="{{url('/dashboard/color')}}"><i class="fa fa-home"></i> color </a></li>
                  <li><a><i class="fa fa-desktop"></i> Product <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('/dashboard/add-product')}}">Add Product</a></li>
                    <li><a href="{{url('/dashboard/manage-product')}}">Manage Product</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i>Orders <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('/dashboard-orders')}}">All Order</a></li>
                    <li><a href="manage-product.html">Daily Orders</a></li>
                  </ul>
                </li>

                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>



