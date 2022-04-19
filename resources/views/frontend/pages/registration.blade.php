@extends('frontend/master')
@section('title','PERFECTALL/Registration')

@section('content')
<div class="registration-form">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="row auth-content">
		            <div class="col-sm-12">
		              <div class="customer-auth">
		                <div class="customer-auth-title">
		                  <h4>create Account </h4>
		                </div>
		                <div id="registration_success_msg">
		                	
		                </div>
		                <div class="customer-auth-form">
		                	<form action="" enctype="multipart/form-data" method="post" id="RegistrationForm">
		                    <div class="form-group">
		                      <label for="">User Name <span class="star">*</span></label>
		                      <input type="text" class="form-control" name="name" id="" placeholder="type your name" required>
		                      <div class="mt-3" id="name_error"></div>
		                    </div>
		                    <div class="form-group">
		                      <label for="">Mobile <span class="star">* </span></label>
		                      <input type="text" class="form-control" name="mobile" id=""  placeholder="mobile number" required>
		                      <div class="mt-3" id="mobile_error"></div>

		                    </div>
		                    <div class="form-group">
		                      <label for="">Password <span class="star">* </span></label>
		                      <input type="password" class="form-control" name="password" id="" placeholder="***********" required>
		                      <div class="mt-3" id="password_error"></div>

		                    </div>
		                    <div class="form-group mt-3">
		                    	<button type="submit" class="single-btn-order border-0">Registration</button>
		                    </div>
		                    @csrf
		                  </form>
		                </div>
		                <div class="not-have-account mt-2">
			                 <span style="color:#535353" > Already have a account<button href="" data-toggle="modal" data-target="#loginModal" class="log-in mr-2" style="border:none;background: transparent;">Login</button></span>
			              </div>

		                <div class="profile-icon">
		                  <img src="{{asset('frontend/assets/img/profile-icon.png')}}" alt="" srcset="">
		                </div>
		              </div>
		            </div>
          		</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
.registration-form {
	margin: 100px -0 100px 0;
}

.profile-icon {
	top: -53px;

}

</style>
@endsection