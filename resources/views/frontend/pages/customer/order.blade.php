@extends('frontend/master')
@section('title','PerfectBD/Orders')

@section('content')
<div class="product-cart-section my-3">
	<div class="product-cart-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="card order-cusotm-card">
						@if(session()->has('danger'))
						<div class="alert alert-danger mb-2">
								<span>{{session()->get('danger')}}</span>
						</div>
						@endif
						<div class="card-header">
							<h4>Orders</h4>
						</div>
						<div class="cart-body table-responsive">
							<table class="table table-hover">
							   <thead>
	                  <tr>
	                    <th style="width: 1%">Order ID</th>
	                    <th style="width: 1%">Payment Type</th>
	                    <th style="width: 20%">Date</th>
	                    <th>Payment Status</th>
	                    <th>Total Amount</th>
	                    <th style="width: 20%">Action</th>
	                  </tr>
	                </thead>

							  <tbody>
							  	@foreach($orders as $order)

                    <tr>
                      <td>
                        {{$order->id}}
                      </td>
                      <td class="project_progress">
                        {{$order->payment_type}}
                      </td>
                      <td class="project_progress">
                        {{$order->date}}
                      </td>
                      <td class="project_progress">
                        <h3 class="badge badge-info text-info">{{$order->payment_status}}</h3>
                      </td>
                      <td class="project_progress">
                        <h3 class="badge badge-success text-info">{{$order->total_amount}} ট</h3>
                      </td>
                      <td>
                        <a href="{{url('/customer/order-detail/')}}/{{$order->id}}/{{$order->customer_id}}" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> View </a>
                        <a href="{{url('/customer/order/delete/')}}/{{$order->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
.order-cusotm-card {
	margin: 100px 0;
}
</style>
@endsection

