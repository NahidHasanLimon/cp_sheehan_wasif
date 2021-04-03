<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Fonik - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="{{asset('backend/assets/images/logo_dark.png')}}" height="30" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                        <p class="text-muted text-center">Sign in to continue to Fonik.</p>

                        {{-- <form class="form-horizontal m-t-30" action="index.html"> --}}
                    <form class="form-horizontal m-t-30" id="sign_in_adm" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="username">Email</label>
                                {{-- <input type="text" class="form-control" id="username" placeholder="Enter username"> --}}
                                <input type=email class="form-control" name=email placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                                
                            </div>
                            @if ($errors->has('email'))
                            <span ><strong>{{ $errors->first('email') }}</strong></span>
                            @endif

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                {{-- <input type="password" class="form-control" id="userpassword" placeholder="Enter password"> --}}
                                <input type=password class="form-control" name=password placeholder="Password" required>
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p>Don't have an account ? <a href="pages-register.html" class="font-500 font-14 text-primary font-secondary"> Signup Now </a> </p>
                <p>© 2018 Fonik. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
            </div>

        </div>


        <!-- jQuery  -->
        <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/waves.js')}}"></script>
        <script src="{{asset('backend/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('backend/assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('backend/assets/js/jquery.scrollTo.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('backend/assets/js/app.js')}}"></script>

    </body>
</html>