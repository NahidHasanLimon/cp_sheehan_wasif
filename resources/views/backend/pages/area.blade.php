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

                <h4 class="mt-0 header-title text-center">Areas</h4>
                <button type="button" class="btn btn-dark waves-effect waves-light" id="add_user_button"><i class="mdi mdi-plus"></i></button>

                <table id="order_table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        {{-- <th>Sl#</th> --}}
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($areas as $area)
                        <tr id="{{$area->id}}">
                            {{-- <td>{{ $loop->index+1 }}</td> --}}
                            <td>{{$area->name}}</td>
                            <td>
                                <button type='button' class='btn btn-outline-success edit-area' data-id="{{$area->id}}" ><i class='mdi mdi-pencil'></i></button>
                                <button type='button' class='btn btn-outline-danger delete-area' data-id="{{$area->id}}" ><i class='mdi mdi-delete'></i></button>
                                
                            </td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- Start modal Including-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="add_area_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form  method="post" id="add_area_form">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="name" placeholder="Enter  Area" id="name_area_am">
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-dark waves-effect waves-light" id="add_area_form_submit_btn">Submit</button>
                    </div>
                     
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- End of  modal Including-->
<!-- Start modal Including-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="edit_area_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form  method="post" id="edit_area_form">
                    @csrf
                    <input class="form-control" type="hidden" name="id" placeholder="Enter  Area" id="id_area_edit">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="name" placeholder="Enter  Area" id="name_area_edit">
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-dark waves-effect waves-light" id="edit_area_form_submit_btn">Submit</button>
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

    // add area 
    // 
   
} );
</script>
<script>
     $(document).on('click','#add_user_button ',function(e) {
        $('#add_area_modal').modal('show');
    });
    $("#add_area_form").validate({
				rules: {
					'name':{
					required: true,
				},
				},
				messages: {
					'name':{ 
						required: 'required',
						
					},
				}
    		});
    $(document).on('submit','#add_area_form',function(e) {
           e.preventDefault();
           console.log('submitted');
               $.ajax({
                   url: "{{route('admin.area.store')}}",
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
                      var order_table=$('#order_table').DataTable();
                                            order_table.row.add( [
                                                  ""+data.area.name+"",
                                                  "<button type='button' class='btn btn-outline-success edit-area' data-id="+data.area.id+"' ><i class='mdi mdi-pencil'></i></button> <button type='button' class='btn btn-outline-danger delete-area' data-id="+data.area.id+"' ><i class='mdi mdi-delete'></i></button> "
                                            ]).draw();
                    }
                    else{
                        $('.alert-error').show().text('Login Failed! Check Your Credentials').delay(5000).fadeOut();
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
    $(document).on('click','.delete-area ',function(e) {
        var id = $(this).data('id');
        var tr = $(this).closest('tr');
       console.log(id);
               $.ajax({
                 type : "get",
                 url : "{{route('admin.area.destroy')}}",
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
            $(document).on('click','.edit-area ',function(e) {
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
       console.log(id);
               $.ajax({
                 type : "get",
                 url : "{{route('admin.area.edit')}}",
                 data: {
                         id:id,
                       },
                 dataType:'JSON',
                 beforeSend: function() {
              
                 },
                   success: function(data) {
                    if (data.success==true) {
                        $('#edit_area_modal').modal('show');
                        $('#edit_area_form').find('#name_area_edit').val(data.area.name);
                        $('#edit_area_form').find('#id_area_edit').val(data.area.id);
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
            $(document).on('submit','#edit_area_form',function(e) {
                e.preventDefault();
                console.log('submitted');
               $.ajax({
                 url: "{{route('admin.area.update')}}",
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
</script>
@endsection