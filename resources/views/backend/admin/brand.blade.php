@extends('backend/master')
@section('title','PerfectBd/Brand')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All Brands</h3>
              </div>

              <div class="title_right text-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#brandModal">
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
                    <h2>Show Brands</h2>
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
                                  <th style="width: 20%">Brand Name</th>
                                  <th style="width: 20%">Brand Slug</th>
                                  <th style="width: 20%">Brand Image</th>
                                  <th style="width: 15%">Status</th>
                                  <th style="width: 20%;">Action</th>
                                </tr>
                              </thead>
                              <tbody class="brand_show" >
                                
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

 <!-- brand insert form -->
<div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-4 offset-sm-3">
                <form action="" enctype="form-data" id="brandForm">
		            <div class="form-group">
		              <label>Brand name <span>*</span></label>
		              <input type="text" name="name" class="form-control" placeholder="Add category name" >
		              <span id="name_error"></span>
		            </div>
		              <div class="form-group">
		                <label>Brand Image <span>*</span></label>
		                <input type="file" name="image" class="form-file-control">
		                <span id="image_error"></span>
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
</div>  <!-- brand insert form -->

<!-- brand edit form -->
<!-- brand insert form -->
<div class="modal fade" id="brandEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-4 offset-sm-3">
                <form action="" enctype="form-data" id="brandUpdateForm">
		            <div class="form-group">
		              <label>Brand name <span>*</span></label>
		              <input type="text" name="name" class="form-control" placeholder="Add category name" required="" id="name">
		              <input type="hidden" name="update_id" id="update_id">
		            </div>
		              <div class="form-group">
		                <label>Brand Image <span>*</span></label>
		                <input type="file" name="image" class="form-file-control">
		              </div>
		              <img id="image" style="width:20%;height: auto;">
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
</div>  <!-- brand edit form -->

<!-- brand delete modal -->
<div class="modal fade" id="brandDelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-12">
                <form action="" enctype="form-data" id="brandDelForm">
		            <div class="form-group">
		             <h6 class="text text-warning">Are You Sure Delete Brand ?</h6>
		             <input type="hidden" name="brand_del_id" id="brand_del_id">
		            </div>
		              <div class="form-group mt-3">
	                	<button class="btn btn-danger btn-sm" id="conform_del_btn">Yes</button>
	              	</div>
	            </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>  <!-- brand delete form -->
@endsection()
