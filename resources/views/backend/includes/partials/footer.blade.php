<footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

     <!-- jQuery -->
    <script src="{{asset('backend/assets/build/js/jquery-1.11.0.min.js')}}"></script>

    <script src="{{asset('backend/assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('backend/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('backend/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>



    <!-- DateJS -->
    <script src="{{asset('backend/assets/vendors/DateJS/build/date.js')}}"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('backend/assets/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('backend/assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('backend/assets/build/js/custom.min.js')}}"></script>
  
    <script src="{{asset('backend/assets/build/customjs/brand.js')}}"></script>
    <script src="{{asset('backend/assets/build/customjs/size.js')}}"></script>
    <script src="{{asset('backend/assets/build/customjs/color.js')}}"></script>
    <script src="{{asset('backend/assets/build/customjs/slider.js')}}"></script>
    <script src="{{asset('backend/assets/build/customjs/banner.js')}}"></script>
    <script src="{{asset('backend/assets/build/customjs/category.js')}}"></script>
    <script src="{{asset('backend/assets/build/customjs/order.js')}}"></script>
    <script src="{{asset('backend/assets/ckeditor5/ckeditor.js')}}"></script>
    <!-- custom style -->
  <style type="text/css">
      .custom-from span { 
        color: blue;
    }

  .custom-from input:focus {
      border-bottom: 1px solid #e83c3b;
  }

  .custom-from textarea:focus {
      border-bottom: 1px solid #e83c3b;
  }

  </style>


  <script>
  ClassicEditor
    .create( document.querySelector( '#editor' ), {
      // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    } )
    .then( editor => {
      window.editor = editor;
    } )
    .catch( err => {
      console.error( err.stack );
    } );
</script>

  </body>
</html>
