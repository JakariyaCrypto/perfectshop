@extends('backend/master')
@section('title','PerfectBd/Dashboard')

@section('content')
<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">{{count($customers)}}</div>
              <span class="count_bottom"><i class="green"></i> <a href="{{route('manage.product')}}">View All</a></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Products</span>
              <div class="count">{{count($products)}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i><a href="{{route('manage.product')}}">View All</a></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Orders</span>
              <div class="count green">{{count($total_orders)}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> <a href="{{route('manage.product')}}">View All</a></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Today Orders</span>
              <div class="count">{{count($orders)}}</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i> </i> <a href="{{route('manage.product')}}">View All</a></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Success Orders</span>
              <div class="count">{{count($succes_orders)}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> <a href="{{route('manage.product')}}">View All</a></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Today Success Order</span>
              <div class="count">{{count($today_succes_orders)}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> <a href="{{route('manage.product')}}">View All</a></span>
            </div>
          </div>
        </div>
          <!-- /top tiles -->
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Display Daily Order</h2>
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
                                  <th style="width: 1%">Date</th>
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
                                  <td>
                                    {{$order->date}}
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
            <!-- home daily order  -->
            <div class="row mt-2">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Display Authentication Member</h2>
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
                                  <th style="width: 1%">#</th>
                                  <th style="width: 20%">Name</th>
                                  <th>Image</th>
                                  <th>Role</th>
                                  <th>Status</th>
                                  <th style="width: 20%">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>#</td>
                                  <td>
                                    <a>Pesamakini Backend UI</a>
                                  </td>
                                  <td>
                                    <ul class="list-inline">
                                      <li>
                                        <img src="images/user.png" class="avatar" alt="Avatar">
                                      </li>
                                    </ul>
                                  </td>
                                  <td class="project_progress">
                                    <div class="progress progress_sm">
                                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="77"></div>
                                    </div>
                                    <small>77% Complete</small>
                                  </td>
                                  <td>
                                    <div class="main_switch">
                                      <input type="checkbox" name="">
                                    </div>
                                  </td>
                                  <td>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> View </a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete </a>
                                  </td>
                                </tr>
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
            <!-- end home our team -->

        </div>

@endsection