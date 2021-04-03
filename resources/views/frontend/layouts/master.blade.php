<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Magnifica Questionnaire Form Wizard includes Corona Virus Covid-19 questionnaire">
    <meta name="author" content="Ansonika">
    <title>Magnifica | Corona Virus Covid-19 Questionnaire Form Wizard by Ansonika</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('frontend/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('frontend/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('frontend/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('frontend/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/menu.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/vendors.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">
	
	<!-- MODERNIZR MENU -->
	<script src="{{asset('frontend/js/modernizr.js')}}"></script>

	<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

</head>

<body>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->

	@include('frontend.partials.header')
	<!-- /Header -->

	<div class="container">
        @yield('content')
    <!-- /Form_container -->
</div>
<!-- /container -->

<div class="container">
    @include('frontend.partials.footer')
    <!-- end footer-->
</div>
<!-- /container -->

<div class="cd-overlay-nav">
    <span></span>
</div>
<!-- /cd-overlay-nav -->
<div class="cd-overlay-content">
    <span></span>
</div>
<!-- /cd-overlay-content -->

	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- Modal info -->
	<div class="modal fade" id="more-info" tabindex="-1" role="dialog" aria-labelledby="more-infoLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="more-infoLabel">Frequently asked questions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	
	<!-- COMMON SCRIPTS -->
	<script src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/common_scripts.min.js')}}"></script>
	<script src="{{asset('frontend/js/velocity.min.js')}}"></script>
	<script src="{{asset('frontend/js/common_functions.js')}}"></script>
	<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<!-- Wizard script with branch -->
    {{-- <script src="{{asset('frontend/js/wizard_without_branch.js')}}"></script> --}}
	<!-- Start login script -->
	{{-- validate plugin --}}
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
	{{-- validate plugin --}}
	<script>
		// validation  error print print
		function validationPrintErrorMsg (msg) {
			$(".print-error-msg").find("ul").html('');
			$(".print-error-msg").css('display','block');
			$.each( msg, function( key, value ) {
				console.log(value);
				$(".print-error-msg").find("ul").append('<li>'+value+'</li>').delay(5000);
				// $('.alert-error').show().text(value);
			});
   		 }
			// end  of validation  error print print
			$('#signup_form').validate({ // initialize the plugin
				rules: {
				email: {
					required: false,
					email: true,
					maxlength : 55,
				},
				full_name: {
					required: true,
					minlength: 5,
					maxlength : 35,
				},
				phone_number: {
					required: true,
					minlength: 10,
					maxlength : 35,
				},
				password: {
					minlength: 5,
					maxlength : 35,
				},
				confirm_password : {
						minlength : 5,
						maxlength : 15,
						equalTo : "#password_signup_input"
					}
				}
			});
			$("#login_form").validate({
				rules: {
					'email':{
					required: true,
					email: true,
				},
				'password':{
					required: true,
				},
				},
				messages: {
					'email':{ 
						required: 'required',
						// number: 'Numbers only mobile number',
					},
					'password':{
						required: 'required.',
					},
				}
    		});
			$("#order_form").validate({
				rules: {
				'area_id':{
					required: true,
				},
				'address':{
					required: true,
				},
				'product_id':{
					required: true,
				},
				'quantity':{
					required: true,
				},
				},
				messages: {
					'area_id':{ 
						required: 'required',
						// number: 'Numbers only mobile number',
					},
					'address':{
						required: 'required.',
					},
					'product_id':{
						required: 'required.',
					},
					'quantity':{
						required: 'required.',
					},
				}
    		});
		$(document).on('submit','#login_form',function(e) {
           e.preventDefault();
               $.ajax({
                   url: "{{route('customer.login')}}",
                 type: "post", 
                 async: true,
                 data: new FormData(this),
                 processData: false,
                 contentType: false,
                 beforeSend: function() {
                //    $("#form_login").prop('disabled', true); // disable button
                 },
                   success: function(data) {
                    if (data.success==true) {
                      toastr.success("Logged in successfully.");
                        location.reload();
                    }
                    else{
                        $('.alert-error').show().text('Login Failed! Check Your Credentials').delay(5000).fadeOut();
                    }
                 },
                 complete: function() {
                //    $("#submit_signup").prop('disabled', false); // disable button
                 },
                 error: function(data,xhr) {
                    console.log( JSON.stringify(data) );
                    console.log(data.status);
                    if(!$.isEmptyObject(data.responseJSON.errors)){
                        validationPrintErrorMsg(data.responseJSON.errors);
                    }
                    if (data.status==419) {
                        $('.alert-error').show().text('For your inactivity token may have expired! Please reload and try again!').delay(10000).fadeOut();
                    }
                    
                     }
               });
             
    }); 
	$(document).on('submit','#signup_form',function(e) {
           e.preventDefault();
               $.ajax({
                 url: "{{route('customer.signup')}}",
                 type: "post", 
                 async: true,
                 data: new FormData(this),
                 processData: false,
                 contentType: false,
                 beforeSend: function() {
                 },
                   success: function(data) {
                    if (data.success==true) {
                      toastr.success("Signed up successfully.");
                        location.reload();
						// $('#login_signup_main_div').hide();
						// $('#confirm_order_div').show();
                    }
                    else{
                        $('.alert-error').show().text('SignIn Failed! Check Your Details').delay(5000).fadeOut();
                    }
                 },
                 complete: function() {
                 },
                 error: function(data,xhr) {
                    console.log( JSON.stringify(data) );
                    console.log(data.status);
                    if(!$.isEmptyObject(data.responseJSON.errors)){
                        validationPrintErrorMsg(data.responseJSON.errors);
                    }
                    if (data.status==419) {
                        $('.alert-error').show().text('For your inactivity token may have expired! Please reload and try again!').delay(10000).fadeOut();
                    }
                    
                     }
               });
             
    }); 
	$(document).on('submit','#order_form',function(e) {
           e.preventDefault();
               $.ajax({
                   url: "{{route('customer.order.store')}}",
                 type: "post", 
                 async: true,
                 data: new FormData(this),
                 processData: false,
                 contentType: false,
                 beforeSend: function() {
                 },
                   success: function(data) {
                    if (data.success==true) {
                      toastr.success("Order Placed Sussfully");
					  $(this).find('form').trigger('reset');
                    }
                    else{
                        $('.alert-error').show().text('SignIn Failed! Check Your Details').delay(5000).fadeOut();
                    }
                 },
                 complete: function() {
                 },
                 error: function(data,xhr) {
                    console.log( JSON.stringify(data) );
                    console.log(data.status);
                    if(!$.isEmptyObject(data.responseJSON.errors)){
                        validationPrintErrorMsg(data.responseJSON.errors);
                    }
                    if (data.status==419) {
                        $('.alert-error').show().text('For your inactivity token may have expired! Please reload and try again!').delay(10000).fadeOut();
                    }
                    
                     }
               });
             
    }); 
	</script>
	<!-- End login script -->
	@yield('pagejs')
</body>
</html>