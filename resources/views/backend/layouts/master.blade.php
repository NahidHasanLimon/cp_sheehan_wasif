<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>CP - Admin Panel</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

        <!-- Basic Css files -->
        <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet" type="text/css">
        {{-- toaster  --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
        @yield('page-css')
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            @include('backend.partials.left-sidebar')
            
            <!-- Left Sidebar End -->


            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    @include('backend.partials.top-bar')
                    
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">
                                @yield('main-page-content')

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2018 Fonik - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('backend/assets/js/waves.js')}}"></script>
        <script src="{{asset('backend/assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('backend/assets/js/jquery.scrollTo.min.js')}}"></script>
        {{-- extra plugin  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
        <!-- App js -->
        <script src="{{asset('backend/assets/js/app.js')}}"></script>
        <script>
            function validationPrintErrorMsg (data,xhr) {
                if(!$.isEmptyObject(data.responseJSON.errors)){
                    msg =data.responseJSON.errors;
                    $.each( msg, function( key, value ) {
                        toastr.error(value);
                    });
                    }
                    if (data.status==419) {
                        toastr.error('For your inactivity token may have expired! Please reload and try again!');
                    }
		
   		 }
        </script>
        @yield('page-script')
    </body>
</html>