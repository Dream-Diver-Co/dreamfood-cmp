<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>@yield('title') - {{ env('APP_NAME') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Laravel E-Commerce Application with Multi-Authentication" name="description" />
        <meta content="Ferdinalaxewall" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/admin/assets/images/logo1.jpg') }}">

        <!-- jquery.vectormap css -->
        <link href="{{ asset('/admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('/admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('/admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- Custom CSS --}}
        <link href="{{ asset('/admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('/admin/assets/css/datetimepicker.css') }}" rel="stylesheet" type="text/css" />

        
        {{-- Toastr --}}
        <link rel="stylesheet" href="{{ asset('/admin/assets/libs/toastr/build/toastr.min.css') }}">
        {{-- font awesome cdn --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

        @stack('head')

    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('admin.components.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.components.sidebar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        {{-- Start Content --}}
                        @yield('content')
                        {{-- End Content --}}
                    </div>

                </div>
                <!-- End Page-content -->

                @include('admin.components.footer')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        @include('admin.components.rightbar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('/admin/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/libs/node-waves/waves.min.js') }}"></script>


        <!-- apexcharts -->
        <script src="{{ asset('/admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ asset('/admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('/admin/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('/admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('/admin/assets/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('/admin/assets/js/app.js') }}"></script>

        <script src="{{ asset('/admin/assets/js/datetimepicker.js') }}"></script>

        {{-- Toastr --}}
        <script src="{{ asset('/admin/assets/libs/toastr/build/toastr.min.js') }}"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        @include('admin.components.notification')

        @stack('script')
    </body>

</html>
