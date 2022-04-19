
<!-- footer-section -->
<div class="footer-section">
  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
          <div class="footer-logo">
            <img src="frontend/assets/img/perfect-all-logo-fianl.png" alt="" srcset="">
            <strong>
              Mushfiq tower (3 rd floor) palakhal Bazar, kocua,Chandpur
            </strong>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
          <div class="footer-title footer-hover">
            <h4>Pages</h4>
            <ul>
              <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="{{url('/term&condition')}}">Terms & Conditions</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
          <div class="footer-title footer-hover">
            <h4>Customer Service</h4>
            <ul>
              <li><a href="#">How to order</a></li>
              <li><a href="#">Faqs</a></li>
              <li><a href="#">online shopping</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
          <div class="footer-title footer-hover">
            <h4>My Account</h4>
            <ul>
              <li>
                @if(session()->exists('regi_user_true'))
                  <a href="{{url('/logout')}}" class="log-in mr-2"> <i class="fas fa-user"></i> Logout</a>
                 @else
                  <i class="fas fa-user"></i> <button class="footer-login" href="" data-toggle="modal" data-target="#loginModal" class="log-in mr-2">Login</button>
                 @endif

              </li>
              <li><a href="{{url('/registration')}}"><i class="fas fa-wallet    "></i> Register</a></li>
              <li><a href="{{url('/cart-product')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="socila-footer">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">

          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="contuct-info">
              <ul>
                <li><i class="fas fa-phone    "></i> +8801314209321 </li>
                <li><i class="fas fa-envelope    "></i> perfectallxyz@gmail.com </li>
                <li><i class="fa fa-mobile    "></i></i> +8801771258298 </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="social-info">
              <span>Join us Social</span>
              <ul>
                <li><a href="#"><i class="fab fa-facebook"></i> </a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></i></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="payment-info">
              <span>Support Online Payment</span>
              <img src="{{asset('frontend/assets/img/rezie-ssl-PhotoRoom.png')}}" alt="" srcset="">
            </div>

        </div>
      </div>
    </div>
  </div>
  <div class="copy">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <span class="copy-text">
            All reserve @ perfectbd.com
            <strong class="dev">Developed By: Jakariya Ahmed </strong>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
  .footer-login {
  background: no-repeat;
  border: none;
  color: #ddd;
  font-size: 19px;
}

.footer-hover ul li {
  color: #ababab;
}
</style>
<!-- footer-section -->