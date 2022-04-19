@extends('backend/master')
@section('title','dashborad/View-product')

@section('content')
	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Order Details</h3>
              </div>
              <div class="title_right text-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <a href="{{route('manage.product')}}" class="btn btn-primary">
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
                    <h2>Product Information</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <table class="table-responsive table-hover table" style="width:100%">
                                
                                <tbody>
                                  <tr>
                                    <td><span>Product Name : </span></td>
                                  <td>{{$product[0]->name}}</td>
                                  </tr>
                                  <tr>
                                  <td><span>Product Color : </span></td>
                                  <td>{{$colors[$product[0]->id][0]->color}}</td>
                                  </tr>
                                  <tr>
                                    <td><span>Product Size : </span></td>
                                  <td>{{$sizes[$product[0]->id][0]->size}}</td>
                                  </tr>
                                  <tr>
                                    <td><span>Product Image : </span></td>
                                  <td><img src="{{asset($product[0]->image)}}" style="width:120px;height:auto;"></td>
                                  </tr>
                                  <tr>
                                    <td><span>Product price : </span></td>
                                  <td>{{$product[0]->price}} ট</td>
                                  </tr>
                                  
                                  <tr>
                                    <td><span>Product MRP : </span></td>
                                  <td>{{$product[0]->mrp}} ট</td>
                                  </tr>
                                  
                                  <tr>
                                    <td><span>Product Description : </span></td>
                                  <td>{!!$product[0]->description !!}</td>
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
                @if(session()->has('message'))
                <div class="alert alert-danger">
                    <span>{{session()->get('message')}}</span>
                </div>
                @endif
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Product Attributes Information</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <table class="table-responsive table-hover table custom-table" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>color</th>
                                    <th>Size</th>
                                    <th>price</th>
                                    <th>Mrp</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @if($product_atts[$product[0]->id][0]->id > 0)
                                    @foreach($product_atts[$product[0]->id] as $list)
                                    <tr>
                                      <td>{{$list->attr_size}}</td>
                                      <td>{{$list->attr_color}}</td>
                                      <td>{{$list->attr_price}} ট</td>
                                      <td>{{$list->attr_mrp}}</td>
                                      <td><img src="{{asset($list->attr_image)}}" style="width:120px;height: auto;"></td>
                                      <td>{{$list->attr_qty}}</td>
                                      <td>
                                        <a href="{{url('/delete-product-attributes/')}}/{{$list->id}}/{{$product[0]->id}}"> <i class="fa fa-trash bg-danger p-2 text-white"></i></a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  @endif
                                </tbody>
                              </table>
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

<style type="text/css">
td {
  width: 5% !important;
}

.custom-table {
  display: inline-table !important;
}
</style>
@endsection