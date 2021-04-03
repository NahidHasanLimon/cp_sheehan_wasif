@extends('backend.layouts.master')
@section('page-css')
<!-- DataTables -->
<link href="{{asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<style media="screen">
   table td {
          text-align: center;
         /* vertical-align: middle; */
         vertical-align: middle!important;
          }
     table th {
          text-align: center;
         vertical-align: middle!important;
          }
    </style>
@endsection
@section('main-page-content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title text-center">users</h4>
                <button type="button" class="btn btn-dark waves-effect waves-light ml-3" id="add_user_button"><i class="mdi mdi-plus"></i></button>

                <table id="order_table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($users as $user)
                        <tr id="{{$user->id}}">
                            
                            <td>{{$user->full_name}} &nbsp; 
                                @if($user->is_admin==1)
                                <span class="badge badge-pink">Admin</span>
                                @endif</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>
                                <button type='button' class='btn btn-dark waves-effect waves-light change-admin-status' data-isadminstatus="{{$user->is_admin}}" data-id="{{$user->id}}" >
                                   <i class='{{$user->is_admin==0?'mdi mdi-account-plus':'mdi mdi-account-minus'}}'></i> </button>
                                <button type='button' class='btn btn-dark waves-effect waves-light edit-user' data-id="{{$user->id}}" ><i class='mdi mdi-pencil'></i></button>
                                <button type='button' class='btn btn-danger waves-effect waves-light delete-user' data-id="{{$user->id}}" ><i class='mdi mdi-delete'></i></button>
                                
                            </td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- Start modal Including Add-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="add_user_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Add user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form  method="post" id="add_user_form">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Full Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="full_name" placeholder="Enter  name" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="email" placeholder="Enter  email" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="password" placeholder="Enter  email" value="password" >
                            <small class="text-muted">Default password : password</small>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="phone_number" placeholder="Enter  phone number" >
                        </div>
                     </div>
                     
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-dark waves-effect waves-light" id="add_user_form_submit_btn">Submit</button>
                    </div>
                     
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- End of  modal Including-->
<!-- Start modal Including Edit-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="edit_user_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Add user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form  method="post" id="edit_user_form">
                    @csrf
                    <input class="form-control" type="hidden" name="id" placeholder="Enter  user" id="id_user_edit">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="full_name" placeholder="Enter  user" id="full_name_user_edit">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="email" placeholder="Enter  email" id="email_user_edit" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="password" placeholder="Enter  password" value="password" id="password_user_edit">
                            <small class="text-muted">you can leave it empty!</small>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="phone_number" placeholder="Enter  phone number" id="phone_number_user_edit">
                        </div>
                     </div>
                     
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-dark waves-effect waves-light" id="edit_user_form_submit_btn">Submit</button>
                    </div>
                     
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- End of  modal Including-->
@endsection
@section('page-script')
<!-- Required datatable js -->
<script src="{{asset('backend/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('backend/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

<script>
$(document).ready(function() {

    //Buttons examples
    var table = $('#order_table').DataTable({
        lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    // add user 
    // 
   
} );
</script>
<script>
     $(document).on('click','#add_user_button ',function(e) {
        $('#add_user_modal').modal('show');
    });
    $("#add_user_form").validate({
				rules: {
					'full_name':{
					required: true,
				},
					'email':{
					required: true,
				},
					'phone_number':{
					required: true,
				},
					'password':{
					required: true,
				},
				},
				messages: {
					'full_name':{ 
						required: 'required',
						
					},
				}
    		});
            $("#edit_user_form").validate({
				rules: {
					'full_name':{
					required: true,
				},
					'email':{
					required: true,
				},
					'phone_number':{
					required: true,
				},
				},
				messages: {
					'full_name':{ 
						required: 'required',
						
					},
				}
    		});
    $(document).on('submit','#add_user_form',function(e) {
           e.preventDefault();
           if ($(this).validate().form()) {
  // do ajax stuff
}
           console.log('submitted');
               $.ajax({
                   url: "{{route('admin.user.store')}}",
                 type: "post", 
                 async: true,
                 data: new FormData(this),
                 processData: false,
                 contentType: false,
                 beforeSend: function() {
              
                 },
                   success: function(data) {
                    if (data.success==true) {
                      toastr.success("Added Successfully");
                    //   var status_action_icon = data.user.is_admin==0?'<i class="mdi mdi-account-plus"></i>':'<i class="mdi mdi-account-minus"></i>';
                      var status_action_icon = '<i class="mdi mdi-account-plus"></i>';
                      var status_action_badge = data.user.is_admin==0?' <span class="badge badge-pink">Admin</span>' :'';
                      var order_table=$('#order_table').DataTable();
                                            order_table.row.add( [
                                                  ""+data.user.full_name+"   "+status_action_badge+"",
                                                  ""+data.user.email+"",
                                                  ""+data.user.phone_number+"",
                                                  "<button type='button' class='btn btn-dark waves-effect waves-light change-admin-status'data-isadminstatus="+data.user.is_admin+" data-id="+data.user.id+"' >"+status_action_icon+"</button>  <button type='button' class='btn btn-dark waves-effect waves-light edit-user' data-id="+data.user.id+"' ><i class='mdi mdi-pencil'></i></button> <button type='button' class='btn btn-danger waves-effect waves-light delete-user' data-id="+data.user.id+"' ><i class='mdi mdi-delete'></i></button> "
                                            ]).draw();
                    }
                    else{
                        toastr.error("Failed to Add");
                    }
                 },
                 complete: function() {
                //    $("#submit_signup").prop('disabled', false); // disable button
                 },
                 error: function(data,xhr) {
                    validationPrintErrorMsg(data,xhr);
                   
                    
                     }
               });
             
    }); 
    $(document).on('click','.delete-user ',function(e) {
        var id = $(this).data('id');
        var tr = $(this).closest('tr');
       console.log(id);
               $.ajax({
                 type : "get",
                 url : "{{route('admin.user.destroy')}}",
                 data: {
                         id:id,
                       },
                 dataType:'JSON',
                 beforeSend: function() {
              
                 },
                   success: function(data) {
                    if (data.success==true) {
                      toastr.success("Deleted Successfully");
                      tr.fadeOut(1000, function(){
                            $(this).remove();
                        });
                    }
                    else{
                        toastr.error("Failed to delete");
                    }
                 },
                 complete: function() {
                //    $("#submit_signup").prop('disabled', false); // disable button
                 },
                 error: function(data,xhr) {
                    validationPrintErrorMsg(data,xhr);
                    
                     }
               });
             
    
            });
            $(document).on('click','.edit-user ',function(e) {
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
       console.log(id);
               $.ajax({
                 type : "get",
                 url : "{{route('admin.user.edit')}}",
                 data: {
                         id:id,
                       },
                 dataType:'JSON',
                 beforeSend: function() {
              
                 },
                   success: function(data) {
                    if (data.success==true) {
                        $('#edit_user_modal').modal('show');
                        $('#edit_user_form').find('#full_name_user_edit').val(data.user.full_name);
                        $('#edit_user_form').find('#email_user_edit').val(data.user.email);
                        $('#edit_user_form').find('#phone_number_user_edit ').val(data.user.phone_number);
                        $('#edit_user_form').find('#password_user_edit').val(data.user.password);
                        $('#edit_user_form').find('#id_user_edit').val(data.user.id);
                    }
                    else{
                        toastr.error("Failed to Find");
                    }
                 },
                 complete: function() {
                //    $("#submit_signup").prop('disabled', false); // disable button
                 },
                 error: function(data,xhr) {
                    validationPrintErrorMsg(data,xhr);
                    
                     }
               });
             
    
            });
            $(document).on('submit','#edit_user_form',function(e) {
                e.preventDefault();
                console.log('submitted');
               $.ajax({
                 url: "{{route('admin.user.update')}}",
                 type: "post", 
                 async: true,
                 data: new FormData(this),
                 processData: false,
                 contentType: false,
                 beforeSend: function() {
                    
                 },
                   success: function(data) {
                    if (data.success==true) {
                      toastr.success("Updatd Successfully");
                      
                    }
                    else{
                        toastr.error("Failed to update");
                    }
                 },
                 complete: function() {
                //    $("#submit_signup").prop('disabled', false); // disable button
                 },
                 error: function(data,xhr) {
                    validationPrintErrorMsg(data,xhr);
                    console.log( JSON.stringify(data) );
                    console.log(data.status);
                   
                    
                     }
               });
             
    });
    $(document).on('click','.change-admin-status',function(e) {
        var tr = $(this).closest('tr');
        var id = $(this).data('id');
        var isadminstatus = $(this).data('isadminstatus');
        console.log(id);
               $.ajax({
                 type : "get",
                 url : "{{route('admin.user.isadminstatuschange')}}",
                 data: {
                         id:id,
                         isadminstatus:isadminstatus,
                       },
                 dataType:'JSON',
                 beforeSend: function() {
              
                 },
                   success: function(data) {
                    if (data.success==true) {
                      toastr.success("Changed Successfully");
                       location.reload();
                    }
                    else{
                        toastr.error("Failed to delete");
                    }
                 },
                 complete: function() {
                //    $("#submit_signup").prop('disabled', false); // disable button
                 },
                 error: function(data,xhr) {
                    validationPrintErrorMsg(data,xhr);
                    
                     }
               });
             
    
            });
</script>
@endsection