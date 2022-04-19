@extends('frontend/master')
@section('title','PERFECTALL/Order-success')

@section('content')

	@if(session()->exists('regi_user_true'))
	<div class="order-success text-center" style="color:#535353">
		<div class="container">
			<div class="row auth-content">
                <div class="col-sm-12">
                    <div class="customer-auth">
                        <div class="">
                        	<h2>Dear {{session()->get('regi_name')}}</h2>
                        	<h5 style="color:orange">Your Order is successfull </h5>
                        	<h6>As soon as we will contact with you </h6>
                        	<h6>Your order ID: {{session()->get('order_id')}} </h6>
                        	<div >
                        		<a href="{{url('/customer/order-detail/')}}/{{session()->get('order_id')}}/{{session()->get('regi_user_login')}}">Order Detail</a>
                        		
                        	</div>
                        	<a href="{{url('/customer/download-slip/')}}/{{session()->get('order_id')}}/{{session()->get('regi_user_login')}}">Download</a>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	@endif
<style type="text/css">
.customer-auth {
	padding: 50px 0 !important;
	margin: 50px 0 !important;
}
</style>
@endsection