@extends('backend/master')
@section('title', 'dashboard/add-product')

@section('content')

 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                @if($id)
                <h3>Edit Product</h3>
                @else
                <h3>Add Product</h3>
                @endif
              </div>

              <div class="title_right text-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <a href="{{route('manage.product')}}" class="btn btn-primary">
                  <i class="fas fa-arrow-right"></i> Manage
                </a>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
              <form action="{{route('product.store')}}" enctype="multipart/form-data" method="post">
              	@csrf
                <div class="row">
                  <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                      <div class="x_title">
                        @if($id)
                        	<h2>Edit Product</h2>
                        @else
                        	<h2>Add Product</h2>
                        @endif
                        <div class="clearfix"></div>
                      </div>
                        <div class="x_content custom-from">
                      <br />
                     
                        <div class="row">
                          <div class="col-sm-4">
                              <div class="form-group">
                                <label>Product Name <span>*</span></label>
                                <input type="text" name="name" class="form-control" value="{{$name}}">
                                <input type="hidden" name="product_id" class="form-control" value="{{$id}}">
                              </div>
                             <!-- input validation -->
                             @error('name')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
								</div>
                             @enderror
                          </div>
                          <div class="col-sm-4">
                              <div class="form-group">
                                <label>Category <span>*</span></label>
                                  <select class="form-control" name="cat_id" id="cat_id" >
                                      <option>----- choose category ----</option>
                                      @foreach($categories as $cat)
                                      	@if($id)
                                      		@if($cat_id == $cat->id)
                                      			<option selected value="{{$cat->id}}">
                                      		@else
                                      			<option value="{{$cat->id}}">
                                      		@endif
                                      		{{$cat->category}}
                                      		</option>
                                      	@else
                                      	<option value="{{$cat->id}}">{{$cat->category}}</option>
                                      	@endif
                                      
                                      @endforeach
                                  </select>
                              </div>
                              <!-- input validation -->
                             @error('cat_id')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
								</div>
                             @enderror
                          </div>
                          <div class="col-sm-4">
                              <div class="form-group">
                                <label>Brand <span>*</span></label>
                                  <select class="form-control" name="brand_id" id="brand_id">
                                      <option>----- choose brand ----</option>
                                      @foreach($brands as $brand)
                                      @if($id)
                                      		@if($brand_id == $brand->id)
                                      			<option selected value="{{$brand->id}}">
                                      		@else
                                      			<option value="{{$brand->id}}">
                                      		@endif
                                      		{{$brand->name}}
                                      		</option>
                                      	@else
                                      	<option value="{{$brand->id}}">{{$brand->name}}</option>
                                      	@endif
                                      
                                      @endforeach
                                  </select>
                              </div>
                              <!-- input validation -->
                             @error('brand_id')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
								</div>
                             @enderror
                          </div>
                            
                         </div>
                          <div class="row my-2">
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Warranty <span>*</span></label>
                                  <select class="form-control" name="warranty" id="warranty">
                                      <option>--choose warranty--</option>
                                         @if($id)
                                        	 @if($warranty == 'yes')
                                            <option value="yes" selected>Yes</option>
                                            <option value="no">No</option>
                                            @else
                                            <option value="yes">Yes</option>
                                            <option value="no" selected>No</option>
                                            @endif
                                             
                                           @endif
                                           <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                  </select>
                              </div>
                              <!-- input validation -->
                             @error('warranty')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
							               	</div>
                             @enderror
                            </div>
                             <div class="col-sm-2">
                              <div class="form-group">
                                <label>Size <span>*</span></label>
                                  <select class="form-control" name="size_id" id="size_id">
                                      <option>--choose size--</option>
                                      @foreach($sizes as $size)
                                       @if($id)
                                      		@if($size_id == $size->id)
                                      			<option selected value="{{$size->id}}">
                                      		@else
                                      			<option value="{{$size->id}}">
                                      		@endif
                                      		{{$size->size}}
                                      		</option>
                                      	@else
                                      	<option value="{{$size->id}}">{{$size->size}}</option>
                                      	@endif
 
                                      @endforeach
                                  </select>
                              </div>
                              <!-- input validation -->
                             @error('size_id')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
								              </div>
                             @enderror
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Color <span>*</span></label>
                                  <select class="form-control" name="color_id" id="color_id">
                                  <option>--choose color--</option>
                                  @foreach($colors as $color)
                                   @if($id)
                                  		@if($color_id == $color->id)
                                  			<option selected value="{{$color->id}}">
                                  		@else
                                  			<option value="{{$color->id}}">
                                  		@endif
                                  		{{$color->color}}
                                  		</option>
                                  		@else
                                  	@endif
                                  <option value="{{$color->id}}">{{$color->color}}</option>
                                  @endforeach
                                  </select>
                              </div>
                              <!-- input validation -->
                             @error('color_id')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
								              </div>
                             @enderror
                            </div>
                            <div class="col-sm-2">
                               <div class="form-group">
                                <label>Price <span>*</span></label>
                                <input type="text" name="price" class="form-control" value="{{$price}}">
                              </div>
                            </div>
                            <div class="col-sm-2">
                               <div class="form-group">
                                <label>MRP <span>*</span></label>
                                <input type="text" name="mrp" class="form-control" value="{{$mrp}}">
                              </div>
                            </div>
                            
                          </div>
                          <div class="row">
                            <div class="col-sm-12" >
                               <div class="form-group">
                                <label> short description<span>*</span></label>
                                <textarea id="editor" rows="6" type="text" name="description" class="form-control" value="">{{$description}}</textarea>
                              </div>
                              <!-- input validation -->
                             @error('description')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
								            </div>
                             @enderror
                            </div>
                          </div>
                          <div class="row my-2">
                            <div class="col-sm-2">
                                <div class="form-group">
                                <label>Product Image <span>*</span></label>
                                <input type="file" name="image" class="form-control">
                              </div>
                              <div>
                              	<img style="width:50%" src="{{asset($image)}}" alt="image">
                              </div>
                              <!-- input validation -->
                             @error('image')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
								              </div>
                             @enderror
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Select Banner <span>*</span></label>
                                  <select class="form-control" name="banner_id" id="banner_id">
                                  <option>--choose banner--</option>
                                  @foreach($banners as $banner)
                                   @if($id)
                                  		@if($banner_id == $banner->id)
                                  			<option selected value="{{$banner->id}}">
                                  		@else
                                  			<option value="{{$banner->id}}">
                                  		@endif
                                  		{{$banner->title}}
                                  		</option>
                                  		@else
                                  	@endif
                                  <option value="{{$banner->id}}">{{$banner->title}}</option>
                                  @endforeach
                                  </select>
                              </div>
                              <!-- input validation -->
                             @error('banner_id')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
								              </div>
                             @enderror
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Select Slider <span>*</span></label>
                                  <select class="form-control" name="slider_id" id="slider_id">
                                  <option>--choose slider--</option>
                                  @foreach($sliders as $slider)
                                  @if($id)
                                  		@if($slider_id == $slider->id)
                                  			<option selected value="{{$slider->id}}">
                                  		@else
                                  			<option value="{{$slider->id}}">
                                  		@endif
                                  		{{$slider->title}}
                                  		</option>
                                  		@else
                                  	@endif
                                  <option value="{{$slider->id}}">{{$slider->title}}</option>
                                  @endforeach
        
                                  </select>
                              </div>
                              <!-- input validation -->
                             @error('slider_id')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
								              </div>
                             @enderror
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Sub category <span>*</span></label>
                                  <select class="form-control" name="sub_cat_id" id="sub_cat_id">
                                  <option>--choose sub category--</option>
                                  @foreach($categories as $list)
                                  	@foreach($sub_cats[$list->id] as $sub_cat)
                                  	@if($id)
                                  		@if($sub_cat_id == $sub_cat->id)
                                  			<option selected value="{{$sub_cat->id}}">
                                  		@else
                                  			<option value="{{$sub_cat->id}}">
                                  		@endif
                                  		{{$sub_cat->category}}
                                  		</option>
                                  		@else
                                  	@endif
                                  <option value="{{$sub_cat->id}}">{{$sub_cat->category}}</option>
                                  	@endforeach
                                  @endforeach
                                  </select>
                              </div>
                              <!-- input validation -->
                             @error('sub_cat_id')
                             	<div class="mt-3 alert alert-danger" role="alert">
                                     {{$message}}
								              </div>
                             @enderror
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      </div>
                    </div>


                    <!-- product attribute section start here -->

                   
                    <div class="row">
                    	 @if(session('message'))
                    	<div class="mt-3 alert alert-danger" role="alert">
		                	<h4>{{session('danger')}}</h4>
		                </div>
		                @endif
                      <div class="col-sm-12">
                        <div class="x_panel">
                          <div class="x_title between-btn">
                            <div class="attribute-title">
                              <h2>Add Product Attributes</h2>
                            </div>
                            <div class="section-left-btn">
                            	@if($id)

                            	@else
                             <span class="attr_add_btn" onclick="add_more()"><i class="fas fa-file-plus"></i> + Add</span>
                             @endif
                           </div>
                            <div class="clearfix"></div>
                          </div>

                          @php 
                          	$loop_count = 1;
                          @endphp
                           @foreach($product_attrs as $key=>$val)

		                    @php
		                      $p_attr = (array)$val;
		                      $prev_loop = $loop_count++;
		                    @endphp
                          <div class="row" id="product_attr_box" class="product_attr_remove{{$loop_count}}">
                            <div class="col-sm-2">
                              <div class="form-group">
                                  <label>Price <span>*</span></label>

                                  <input type="text" name="attr_price[]" class="form-control" value="{{$p_attr['attr_price']}}">
                                  <input type="hidden" value="{{$p_attr['id']}}" name="paid[]" class="form-control-success form-control" id="paid">
                                </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-group">
                                  <label>MRP <span>*</span></label>
                                  <input type="text" name="attr_mrp[]" class="form-control" value="{{$p_attr['attr_mrp']}}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-group">
                                  <label>Quantity <span>*</span></label>
                                  <input type="text" name="attr_qty[]" class="form-control" value="{{$p_attr['attr_qty']}}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>Color <span>*</span></label>
                                  <select class="form-control" name="attr_color[]" id="attr_color">
                                  <option>--choose color--</option>
                                  @foreach($colors as $color)
		                     		 @if($p_attr['attr_color'] == $color->id)
                                        <option selected value="{{$color->id}}"> {{$color->color}}
                                        </option>
                                    @else
                                        <option value="{{$color->id}}"> {{$color->color}}
                                        </option>
                                    @endif
                                  <!-- <option value="{{$color->id}}">{{$color->color}}</option> -->
                                  @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-sm-2">
                              <div class="form-group">
                                <label>Size <span>*</span></label>
                                  <select class="form-control" name="attr_size[]" id="attr_size">
                                      <option>--choose size--</option>
                                       @foreach($sizes as $size)
                                       @if($p_attr['attr_size'] == $size->id)
                                        <option selected value="{{$size->id}}"> {{$size->size}}
                                        </option>
	                                    @else
	                                        <option value="{{$size->id}}"> {{$size->size}}
	                                        </option>
	                                    @endif

	                                  @endforeach
                                  </select>
                              </div>
                           </div>
                         <div class="col-sm-2">
                            <div class="form-group">
                            <label>Product Image <span>*</span></label>
                            <input type="file" name="attr_image[]" class="form-file-control">
                             @if($id)
                              <a href="{{url('dashboard/product/attribute/delete')}}/{{$p_attr['id']}}/{{$id}}">
                               <span class="attr_remove_btn"><i class="fas fa-file-plus"></i> -- </span>
                              </a>
                             @endif
                           
                          </div>
                          @if($p_attr['attr_image'] != '')
                          	<img src="{{asset($p_attr['attr_image'])}}" width="100">
                          @endif
                        </div>
                            
                        </div>
                        @endforeach
                      </div>
                      </div>
                    </div>
                    
                    <!-- <div class="row">
                      <div class="col-sm-12">
                        <div class="x_panel">
                          <div class="x_title between-btn">
                            <div class="attribute-title">
                             <h2>Add Multi Images</h2>
                            </div>
                            <div class="section-left-btn">
                             <span class="attr_add_btn"><i class="fas fa-file-plus"></i> + add</span>
                           </div>
                            <div class="clearfix"></div>
                          </div>
                            <div class="row">
                              <div class="col-sm-3">
                                <div class="form-group">
                                <label>Image <span>*</span></label>
                                <input type="file" name="image[]" class="form-file-control">
                              </div>
                            </div>
                            </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="col-sm-12">
                      <div class="form-group">
                      	@if($id)
                      		<button class="btn custom-btn">Update</button>
                      	@else
                      		<button class="btn custom-btn">Insert</button>
                      	@endif
                    </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<script type="text/javascript">
	var loop_count= 1;
	function add_more(){
		loop_count++;
		var html = '<input type="hidden" class="form-control"  value="" name="paid[]" id="paid">\
					<div class="row product_attr_remove'+loop_count+'">\
				';
			html+= ' <div class="col-sm-2">\
                  <div class="form-group">\
                      <label>Price <span>*</span></label>\
                      <input type="text" name="attr_price[]" class="form-control">\
                    </div>\
                </div>';
                html+= ' <div class="col-sm-2">\
                      <div class="form-group">\
                          <label>MRP <span>*</span></label>\
                          <input type="text" name="attr_mrp[]" class="form-control">\
                        </div>\
                    </div>';
                html+='<div class="col-sm-2">\
	                      <div class="form-group">\
	                          <label>Quantity <span>*</span></label>\
	                          <input type="text" name="attr_qty[]" class="form-control">\
	                        </div>\
	                    </div>';
                var color_id_html = jQuery('#attr_color').html();
                html+= '<div class="col-sm-2">\
                          <div class="form-group">\
                            <label>Color <span>*</span></label>\
                              <select class="form-control" name="attr_color[]" id="brand">\
                                  '+color_id_html+'\
                              </select>\
                          </div>\
                      </div>';
               var size_id_html = jQuery('#attr_size').html();
               html+= '<div class="col-sm-2">\
	                      <div class="form-group">\
	                        <label>Color <span>*</span></label>\
	                          <select class="form-control" name="attr_size[]" id="brand">\
	                              '+size_id_html+'\
	                          </select>\
	                      </div>\
	                  </div>';
	           html+= '<div class="col-sm-2">\
                        <div class="form-group">\
                        <label>Product Image <span>*</span></label>\
                        <input type="file" name="attr_image[]" class="form-file-control">\
                      </div>\
                      <span class="attr_remove_btn" onclick=remove_more("'+loop_count+'")><i class="fas fa-file-plus"></i> -- </span>\
                    </div>';

		$('#product_attr_box').append(html);
	}

 //remove attributes function
function remove_more(loop_count)
    {
        $('.product_attr_remove'+loop_count).remove();
    }

</script>
@endsection