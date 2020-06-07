<footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('backend')}}/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="{{asset('backend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('backend')}}/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="{{asset('backend')}}/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <!-- <script src="{{asset('backend')}}/vendor/chart.js/Chart.min.js"></script> -->
    <script src="{{asset('backend')}}/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{asset('backend')}}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- <script src="{{asset('backend')}}/js/charts-home.js"></script> -->
    <!-- Main File-->
    <script src="{{asset('backend')}}/js/front.js"></script>
    <script src="{{asset('backend')}}/js/toastr.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
          $(document).ready( function () {
            $('.data-table').DataTable();
        } );
        </script>
        @yield('js')
      
      {!! Toastr::message() !!}
  </body>
</html>