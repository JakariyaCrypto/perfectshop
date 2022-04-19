@extends('backend/master')
@section('title','dashborad/Order-Detail')

@section('content')
	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Order Details</h3>
              </div>
              <div class="title_right text-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <a href="{{route('all.order')}}" class="btn btn-primary">
                  <i class="fa fa-arrow-left"></i> Back
                </a>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Customer Information</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <table class="table-responsive table-hover table custom-table" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Delivery Informaiton</th>
                                    <th>Mobile</th>
                                    <th>Image</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>{{$order_detail[0]->name}}</td>
                                    <td><strong>{{$order_detail[0]->delivery_info}}</strong></td>
                                    <td><h5 style="color:orange">{{$order_detail[0]->mobile}}</h5></td>
                                    <td><img style="width: 100px;height: auto" src="{{asset($order_detail[0]->image)}}"></td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order Information</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <table class="table-responsive table-hover table custom-table" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Order ID</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>{{$order_detail[0]->id}}</td>
                                    <td>{{$order_detail[0]->payment_type}}</td>
                                    <td><h5 style="color:orange">{{$order_detail[0]->payment_status}}</h5></td>
                                    <td><h4 class="badge badge-success">{{$order_detail[0]->order_status}}</h4></td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Product Information</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <table class="table-responsive table-hover table custom-table" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>size</th>
                                    <th>color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $total = 0;
                                  ?>
                                  @foreach($order_detail as $product)
                                  <tr>
                                    <td>{{$product->pname}}</td>
                                    <td><img src="{{asset($product->attr_image)}}" style="width: 120px;height: 100px;"></td>
                                    <td>{{$product->size}}</td>
                                    <td>{{$product->color}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->qty}}</td>
                                    <td>
                                      
                                    <h6 style="color:orange;">
                                      {{
                                        $subTotal = $product->qty * $product->price; 

                                        }}

                                        ট
                                    </h6>
                                    </td>
                                    <?php
                                      $total = $total + $subTotal;

                                    ?>
                                  </tr>
                                  @endforeach
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td><h5>Total Amount:</h5></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> <h5>{{$total}}</h5> ট</td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Order Information</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                        <div id="success_msg">
                          
                        </div>
                          <div class="col-sm-12">
                            <form action="" id="chageOrderStatus">
                                <div class="row">
                                  <input type="hidden" name="order_id" value="{{$order_detail[0]->id}}">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                      <label>Change Order Status</label>
                                      <select class="form-control" name="order_status">
                                        <option>------ Select Order Status</option>
                                        <option value="pending">Pedding</option>
                                        <option value="on-the-way">On-the-way</option>
                                        <option value="success">Success</option>
                                      </select>
                                    </div>
                                   </div> 
                                   <div class="col-md-8">
                                      <div class="form-group">
                                      <label>Add tracking info</label>
                                      <textarea rows="3" name="add_track_info" class="form-control"></textarea>
                                    </div>
                                   </div> 
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-success btn-md">Change</button>    
                                </div>
                              </form>
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

<style type="text/css">
.custom-table {
  display: inline-table !important;
}
</style>
@endsection