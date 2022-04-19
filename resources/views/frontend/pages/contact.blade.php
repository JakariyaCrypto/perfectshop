@extends('frontend/master')
@section('title','PERFECTALL/Contact-Us')

@section('content')

	<div class="order-success text-center" style="color:#535353">
		<div class="container">
			<div class="row auth-content">
                <div class="col-sm-6">
                    <div class="customer-auth">
                        <div class="contact-info">
                        	<ul>
                        	<li><i class="fas fa-phone"></i> +8801314209321</li>
                        	<li><i class="fas fa-envelope"></i> perfectallxyz@gmail.com</li>
                        	<li><i class="fas fa-location-dot"></i> Mushfiq tower (3 rd floor) palakhal Bazar, kocua,Chandpur</li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="customer-auth text-left p-2">
                        <h4 class="text-center">Contact us</h4>
                        <div class="contact-form">
                        	<div class="success"></div>
                        	<form method="post" id="contactForm">
                        		@csrf
                        		<div class="form-group">
                        			<label>Name</label>
                        			<input type="text" name="name" class="form-control">
                        			<div class="name_error mt-2"></div>
                        		</div>
                        		<div class="form-group">
                        			<label>Mobile</label>
                        			<input type="text" name="mobile" class="form-control">
                        			<div class="mobile_error mt-2"></div>
                        		</div>
                        		<div class="form-group">
                        			<label>Write Something..</label>
                        			<textarea type="text" name="desc" class="form-control"></textarea>

                        		</div>
                        		<div class="form-group mt-3">
                        			<button type="submit" class="btn btn-primary">Submit</button>
                        		</div>
                        	</form>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
<style type="text/css">
.customer-auth {
	padding: 50px 0 !important;
	margin: 50px 0 !important;
}

.contact-form {
	padding: 30px;
}

.contact-info {
	text-align: left;
	padding: 20px;
}

.contact-info ul li {
	line-height: 40px;
}
</style>
@endsection