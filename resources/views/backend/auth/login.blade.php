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

    <!-- Custom Theme Style -->
    <link href="{{asset('backend/assets/build/css/custom.min.css')}}" rel="stylesheet">

  </head>


  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{route('check.login')}}" method="post" id="">
              @csrf
              <h1>Dashboard Login</h1>
              @if(session()->has('danger'))
              <div class="alert alert-danger">{{session()->get('danger')}}</div>
              @endif

              <div>
                <input type="email" name="email" class="form-control" placeholder="E-mail"  />
                
              </div>
              @error('email')
                <div class="alert alert-danger">
                  <span>{{$message}}</span>
                </div>
              @enderror
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password"/>
                @error('password')
                <div class="alert alert-danger">
                  <span>{{$message}}</span>
                </div>
                @enderror

              </div>
              <div>
                <button type="submit" class="btn custom-btn">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <?php 


                  ?>
                  <h1><img style="width:50%;" src="{{asset('backend/assets/img/resize-logo-PhotoRoom.png')}}"></i> </h1>
                  <p> @ <?php echo "20". date('y')?> All Rights Reserved. PERFECTALL. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>

      <!-- jQuery -->
    <script src="{{asset('backend/assets/build/js/jquery-1.11.0.min.js')}}"></script>

    <script src="{{asset('backend/assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('backend/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/build/js/auth.js')}}"></script>

<style type="text/css">
.custom-btn { 
  background: #2a3f54;
  color: yellow;
  width: 20%;
  border-radius: .5em;
  margin: 10px;
  font-weight: bold;
  box-shadow: 0px 0px 5px 2px rgba(0,0,0,.1);
  padding: 8px 10px;
  height: auto !important;
}
</style>
    <!-- custom style -->
  </body>
</html>

