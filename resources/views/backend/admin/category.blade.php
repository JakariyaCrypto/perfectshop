@extends('backend/master')
@section('title','Dashboard/category')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All Categories</h3>
              </div>

              <div class="title_right text-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
                  + Add New
                </button>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
              	<div  id="succes" class="danger">
	      			
	      		</div>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Show Categories</h2>
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
                                  <th style="width: 20%">Category</th>
                                  <th style="width: 25%">Sub Category</th>
                                  <th style="width: 15%">Category Image</th>
                                  <th style="width: 10%">Status</th>
                                  <th style="width: ;">Action</th>
                                </tr>
                              </thead>
                              <tbody class="category_show" >
                                
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
        <!-- /page content -->

 <!-- category insert form -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-6 offset-sm-3">
                <form action="" enctype="form-data" id="categoryForm">
		            
                <div class="form-group">
                  <label>Sub Category <span>*</span></label>
                  <select class="form-control" name="parent_id">
                    <option value="">--- null category ---</option>
                    @foreach($parent_cats as $parent_cat)
                    
                    <option value="{{$parent_cat->id}}">{{$parent_cat->category}}</option>
                    @endforeach
                  </select>
                  <span class="mt-2" id="short_desc_error"></span>
                </div>
                <div class="form-group">
                  <label>Category <span>*</span></label>
                  <input type="text" name="category" class="form-control" placeholder="Add category" required>
                  <span class="mt-2" id="category_error"></span>
                </div>

	              <div class="form-group">
	                <label>Category Image <span>*</span></label>
	                <input type="file" name="image" class="form-file-control">
	                <span class="mt-2" id="image_error"></span>
	              </div>
	              <div class="form-group mt-3">
                	<button class="btn btn-primary">Insert</button>
              	</div>
	            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  <!-- category insert form -->

<!-- category edit form -->
<div class="modal fade" id="categoryEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Update category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-6 offset-sm-3">
                <form action="" enctype="form-data" id="categoryUpdateForm">
		            <div class="form-group">
		              <label>Category <span>*</span></label>
		              <input type="text" name="category" class="form-control" placeholder="Add title" required="" id="category">
                  <span class="mt-2" id="category_update_error"></span>
		              <input type="hidden" name="update_id" id="update_id">
		            </div>
                <div class="form-group">
                  <label>Sub Category <span>*</span></label>
                  <select class="form-control" name="parent_id">
                    <option value="">--- null category ---</option>
                    @foreach($parent_cats as $parent_cat)
                    
                    <option value="{{$parent_cat->id}}">{{$parent_cat->category}}</option>
                    
                    @endforeach
                  </select>
                  <span class="mt-2" id="short_desc_error"></span>
                </div>
	              <div class="form-group">
	                <label>category Image <span>*</span></label>
	                <input type="file" name="image" class="form-file-control">
                  <span class="mt-2" id="image_update_error"></span>
	              </div>
	              <img id="update_image" style=";">
	              <div class="form-group mt-3">
                	<button class="btn btn-primary">Update</button>
              	</div>
	            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  <!-- category edit form -->

<!-- category delete modal -->
<div class="modal fade" id="categoryDelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-12">
                <form action="" enctype="form-data" id="categoryDelForm">
		            <div class="form-group">
		             <h6 class="text text-warning">Are You Sure Delete category ?</h6>
		             <input type="hidden" name="category_del_id" id="category_del_id">
		            </div>
		              <div class="form-group mt-3">
	                	<button class="btn btn-danger btn-sm" id="category_conform_del_btn">Yes</button>
	              	</div>
	            </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>  <!-- category delete form -->
@endsection()
