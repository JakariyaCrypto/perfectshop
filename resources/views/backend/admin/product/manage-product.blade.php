@extends('backend/master')
@section('title','dashborad/manage-product')

@section('content')
	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All Products</h3>
              </div>
               
              <div class="title_right text-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <a href="{{route('add.product')}}" class="btn btn-primary">
                  + Add New
                </a>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
              @if(session()->has('message'))
                <div class="mt-3 alert alert-success" role="alert">
                <span>{{session()->get('message')}}</span>
                </div>
                @endif
              @if(session()->has('danger'))
                <div class="mt-3 alert alert-danger" role="alert">
                  <span>{{session()->get('danger')}}</span>
                </div>
              @endif
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Show Products</h2>
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
                                  <th style="width: 20%">Product Name</th>
                                  <th>Product Image</th>
                                  <th>Product Price</th>
                                  <th>Product MRP</th>
                                  <th>Status</th>
                                   <th>Category</th>
                                  <th style="width: 20%">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                            @foreach($products as $product)
                              @foreach($cats[$product->id] as $cat)
                                <tr>
                                  <td>#</td>
                                  <td>
                                    {{$product->name}}
                                  </td>
                                  <td>
                                    <ul class="list-inline">
                                      <li>
                                       <a href="{{$product->image}}" target="_blank">
                                          <img style="width: 100%;height: 150px" src="{{asset($product->image)}}" class="avatar" alt="image">
                                       </a>
                                      </li>
                                    </ul>
                                  </td>
                                  <td class="project_progress">
                                    {{$product->price}} ট
                                  </td>
                                  <td class="project_progress">
                                    {{$product->mrp}} ট
                                  </td>
                                  <td>
                                    @if($product->status == 'active')
                                    <a href="{{url('/inactive-status/')}}/{{$product->id}}"><i class="fa fa-arrow-up btn btn-info text-white"></i></a>
                                    @else
                                      <a href="{{url('/active-status/')}}/{{$product->id}}"><i class="fa fa-arrow-down btn btn-warning text-white"></i></a>
                                    @endif
                                  </td>
                                  <td class="project_progress">
                                    {{$cat->category}}
                                  </td>
                                  <td>
                                    <a href="{{url('dashboard/product/view-product/')}}/{{$product->id}}" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> View </a>
                                    <a href="{{url('dashboard/add-product/')}}/{{$product->id}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="{{url('dashboard/product/delete/')}}/{{$product->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete </a>
                                  </td>
                                </tr>
                                  @endforeach
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