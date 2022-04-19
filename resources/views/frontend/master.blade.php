@include('frontend/includes/partials/header')
      
  @yield('content')

@include('frontend/includes/partials/footer')


<!-- registraion modal -->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:orange;">
        <h5 class="modal-title" id="exampleModalLongTitle">Login now</h5>
        <button type="button" class="close btn-black" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="post" id="LoginForm">
        @csrf
        <div class="modal-body">
          <div class="row auth-content">
            <div class="col-sm-12">
              <div class="customer-auth">
                <div class="customer-auth-title">
                  <h4>Login Account </h4>
                </div>
                <div id="warning"></div>
                <div class="customer-auth-form">
                    <div class="form-group">
                      <label for="">Mobile <span class="star">* </span></label>
                      <input type="text" class="form-control" name="mobile" id=""  placeholder="mobile number" required>
                      <div id="mobile_error"></div>
                    </div>
                    <div class="form-group">
                      <label for="">Password <span class="star">* </span></label>
                      <input type="password" class="form-control" name="password" id="" placeholder="Choose password" required>
                      <div id="password_error"></div>
                    </div>
                  
                </div>
                <div class="profile-icon">
                  <img src="{{asset('frontend/assets/img/profile-icon.png')}}" alt="" srcset="">
                </div>
              </div>
              <div class="not-have-account mt-2">
                <span style="color:#535353" > Don`t have any account <a href="{{url('/registration')}}">Signup</a></span>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="single-btn-order border-0" id="login_btn">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- login modal -->

<!-- alert message for exit product -->
<!-- exit modal -->

<div class="modal fade" id="poduct_del_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content custom-modal-content">
        <div class="modal-body">
          <div class="modal-message py-3">
              <span class="text text-danger"> Product succesfully delete from cart</span>
          </div>
          <button type="button" class="custom_alrt_modal_btn" data-dismiss="modal"><i class="fas fa-check"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- exit modal -->


<!-- alert message for success product -->

<div class="modal fade" id="success_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content custom-modal-content">
        <div class="modal-body">
          <div class="modal-message py-3">
              <span class="text text-success"> Product succesfully added to cart </span>
          </div>
          <button type="button" class="custom_alrt_modal_btn" data-dismiss="modal"><i class="fas fa-check"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- success modal -->

<!-- alert message for update cart product -->

<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content custom-modal-content">
        <div class="modal-body">
          <div class="modal-message py-3">
              <span class="text text-warning"> Product cart succesfully updated </span>
          </div>
          <button type="button" class="custom_alrt_modal_btn" data-dismiss="modal"><i class="fas fa-check"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- update modal -->


  <script src="{{asset('frontend/assets/js/jquery-3.6.0.js')}}"></script>
  <script src="{{asset('frontend/assets/js/popper.min.js')}}" ></script>
  <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/fontend.js')}}"></script>
  <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/backend.js')}}"></script>
  <script src="{{asset('frontend/assets/js/slider.js')}}"></script>
  <script src="{{asset('frontend/assets/js/contact.js')}}"></script>
<!-- slick slide js -->
  <script>
    $('.single-image').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.multi-image'
  });

  

  $('.multi-image').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.single-image',
    centerMode: true,
    focusOnSelect: true
    });
</script>

<style type="text/css">
 .prouduct-cart-header {
    background: orange;
  } 

.product-cart {
  background: #dddd;
}

.customer-auth {
  padding: 10px 20px 100px 20px;

}

.modal-message span {
  font-size: 15px;
  font-weight: bold;
}

.custom_alrt_modal_btn {
  background: orange;
  border: none;
  position: absolute;
  top: -4px;
  right: -5px;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  border-radius: 50px;
  box-shadow: 0px 1px 8px 1px rgb(0,0,0,.3);
}

.custom-modal-content{
  margin-top: 200px;
}
</style>
  </body>
</html>
