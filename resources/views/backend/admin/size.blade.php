
@extends('backend/master')
@section('title','PerfectBd/Size')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All Sizes</h3>
              </div>

              <div class="title_right text-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sizeModal">
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
                    <h2>Show Sizes</h2>
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
                                  <th style="width: 20%">Size Name</th>
                                  <th style="width: 15%">Status</th>
                                  <th style="width: 10%;">Action</th>
                                </tr>
                              </thead>
                              <tbody class="size_show" >
                                
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
<div class="modal fade" id="sizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-4 offset-sm-3">
                <form action="" enctype="form-data" id="sizeForm">
		            <div class="form-group">
		              <label>Brand size <span>*</span></label>
		              <input type="text" name="size" class="form-control" placeholder="Add size" >
		              <span id="size_error"></span>
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
<div class="modal fade" id="sizeEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-4 offset-sm-3">
                <form action="" enctype="form-data" id="sizeUpdateForm">
		            <div class="form-group">
		              <label>Size <span>*</span></label>
		              <input type="text" name="size" class="form-control" placeholder="Add size" required="" id="size">
		              <input type="hidden" name="size_id" id="size_id">
		            </div>
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
<div class="modal fade" id="sizeDelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="x_content custom-from">
          <br />
            <div class="row">
              <div class="col-sm-12">
                <form action="" enctype="form-data" id="sizeDelForm">
		            <div class="form-group">
		             <h6 class="text text-warning">Are You Sure Delete Size ?</h6>
		             <input type="hidden" name="size_del_id" id="size_del_id">
		            </div>
		              <div class="form-group mt-3">
	                	<button class="btn btn-danger btn-sm" id="size_conform_del_btn">Yes</button>
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
