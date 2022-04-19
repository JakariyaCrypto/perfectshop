@extends('backend/master')
@section('title','Dashboard/Banner')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All Banners</h3>
              </div>

              <div class="title_right text-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bannerModal">
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
                    <h2>Show Banners</h2>
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
                                  <th style="width: 20%">Banner Title</th>
                                  <th style="width: 25%">Banner Description</th>
                                  <th style="width: 15%">Banner Image</th>
                                  <th style="width: 10%">Status</th>
                                  <th style="width: 14%">Button Name</th>
                                  <th style="width: 200px !important;">Action</th>
                                </tr>
                              </thead>
                              <tbody class="banner_show" >
                                
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

 <!-- banner insert form -->
<div class="modal fade" id="bannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-6 offset-sm-3">
                <form action="" enctype="form-data" id="bannerForm">
		            <div class="form-group">
		              <label>Banner Title <span>*</span></label>
		              <input type="text" name="title" class="form-control" placeholder="Add title" required>
		              <span class="mt-2" id="name_error"></span>
		            </div>
                <div class="form-group">
                  <label>Short Description <span>*</span></label>
                  <textarea rows="5" type="text" name="short_desc" class="form-control" placeholder="Add short description" id="clear-id"></textarea>
                  <span class="mt-2" id="short_desc_error"></span>
                </div>
		              <div class="form-group">
		                <label>Banner Image <span>*</span></label>
		                <input type="file" name="image" class="form-file-control">
		                <span class="mt-2" id="image_error"></span>
		              </div>
                   <div class="form-group">
                    <label>Banner Button <span>*</span></label>
                    <input type="text" name="btn_name" class="form-control" placeholder="add button name">
                    <span class="mt-2" id="btn_name_error"></span>
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
</div>  <!-- banner insert form -->

<!-- banner edit form -->
<div class="modal fade" id="bannerEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-6 offset-sm-3">
                <form action="" enctype="form-data" id="bannerUpdateForm">
		            <div class="form-group">
		              <label>Banner Title <span>*</span></label>
		              <input type="text" name="title" class="form-control" placeholder="Add title" required="" id="title">
                  <span class="mt-2" id="title_update_error"></span>
		              <input type="hidden" name="update_id" id="update_id">
		            </div>
                <div class="form-group hide-short_desc">
                  <label>Short Description <span>*</span></label>
                  <textarea rows="5" type="text" name="short_desc" class="form-control" placeholder="Add short description " id="short_desc"></textarea>
                  <span id="short_desc_update_error"></span>
                </div>
                   <div class="form-group">
                    <label>Banner Button <span>*</span></label>
                    <input type="text" name="btn_name" class="form-control" id="btn_name">
                    <span id="btn_name_update_error"></span>
                  </div>
		              <div class="form-group">
		                <label>Banner Image <span>*</span></label>
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
</div>  <!-- banner edit form -->

<!-- banner delete modal -->
<div class="modal fade" id="bannerDelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-12">
                <form action="" enctype="form-data" id="bannerDelForm">
		            <div class="form-group">
		             <h6 class="text text-warning">Are You Sure Delete banner ?</h6>
		             <input type="hidden" name="banner_del_id" id="banner_del_id">
		            </div>
		              <div class="form-group mt-3">
	                	<button class="btn btn-danger btn-sm" id="banner_conform_del_btn">Yes</button>
	              	</div>
	            </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>  <!-- banner delete form -->
@endsection()
