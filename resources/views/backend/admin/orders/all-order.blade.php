@extends('backend/master')
@section('title','dashborad/All-Order')

@section('content')
	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All Orders</h3>
              </div>
            </div>

            <div class="clearfix"></div>
                @if(session()->has('danger'))
                <div class="mt-3 alert alert-danger" role="alert">
                 <span>{{session()->get('danger')}}</span>
                </div>
                @endif
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Show Orders</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                               <!-- start project list -->
                              <thead>
                                <tr>
                                  <th style="width: 1%">Order ID</th>
                                  <th style="width: 20%">Payment Type</th>
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
                                    <h4 class="badge badge-info">{{$order->payment_status}}</h4>
                                  </td>
                                  <td class="project_progress">
                                    <h4 class="badge badge-success">{{$order->total_amount}} ট</h4>
                                  </td>
                                  <td>
                                    <a href="{{url('/dashboard/order-detail/')}}/{{$order->id}}/{{$order->customer_id}}" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> View </a>
                                    <a href="{{url('dashboard/order/delete/')}}/{{$order->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete </a>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- end project list -->
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

  
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection