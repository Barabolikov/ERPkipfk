   @include('admin.body.header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.body.sidebar')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ===assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js=========================================================== -->
  @yield('content')
    <!-- end main content-->
   @include('admin.body.footer')
