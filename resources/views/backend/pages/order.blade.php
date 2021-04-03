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

                <h4 class="mt-0 header-title text-center">Orders</h4>
                <button type="button" class="btn btn-dark waves-effect waves-light ml-3" id="add_order_button"><i class="mdi mdi-plus"></i></button>

                <table id="order_table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        {{-- <th>Sl#</th> --}}
                        <th>Date</th>
                        <th>Area</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($orders as $order)
                        <tr data-id={{$order->id}}>
                            {{-- <td>{{ $loop->index+1 }}</td> --}}
                            <td>
                                {{ \Carbon\Carbon::parse($order->created_at)->format(' jS \\of F Y h:i A') }}
                              </td>
                            <td>{{$order->area->name}}</td>
                            <td>{{$order->address}}</td>
                            <td>
                                {{-- {{$order->status}} --}}
                                <select name="order_status" class="btn btn-mini order-status">
                                    <option value="placed" {{$order->status=='placed'? 'active' :''}}>Placed</option>
                                    <option value="confirmed"{{$order->status=='confirmed'? 'active': ''}}>Confirmed</option>
                                    <option value="delivered"{{$order->status=='delivered'? 'active': ''}}>Delivered</option>
                                </select>
                            </td>
                            <td>
                                <button type='button' class='btn btn-dark waves-effect waves-light change-admin-status'>
                                    <i class='mdi mdi-eye'></i> </button>
                                 <button type='button' class='btn btn-dark waves-effect waves-light edit-order'><i class='mdi mdi-pencil'></i></button>
                                 <button type='button' class='btn btn-danger waves-effect waves-light delete-order'><i class='mdi mdi-delete'></i></button>
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
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="add_order_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form  method="post" id="add_order_form">
                    @csrf
                    <div class="form-group row" id="select_customer_div">
                        <label for="name" class="col-sm-4 col-form-label">Select Customer</label>
                        <div class="col-sm-8">
                            <select name="user_id" id="user_id_add" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->full_name}}</option>
                                @endforeach
                            </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">want to add a new customer ?</label>
                        <div class="col-sm-8">
                           <input type="checkbox" name="is_new_customer" id="is_new_customer">
                        </div>
                     </div>

                  <div class="d-none" id="new_user_section">

                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="full_name" placeholder="enter full name" id="full_name_user_add">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="email" placeholder="enter  email" id="email_user_add" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="password" placeholder="enter password" value="password" id="password_user_add">
                            <small class="text-muted">you can leave it empty!</small>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="phone_number" placeholder="enter phone number" id="phone_number_user_add">
                        </div>
                     </div>
                     
                            
                </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Select Product</label>
                        <div class="col-sm-8">
                            <select name="product_id" id="product_id_add" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                     </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Quantity</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="quantity" placeholder="enter qunatity" id="quantity_add">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="address" placeholder="enter address" id="address_add">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Select Area</label>
                        <div class="col-sm-8">
                            <select name="area_id" id="area_id_add" class="form-control">
                                @foreach ($areas as $area)
                                    <option value="{{$area->id}}">{{$area->name}}</option>
                                @endforeach
                            </select>
                        </div>
                     </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Date</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="date" name="order_date" placeholder="" id="">
                        </div>
                     </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Order Status</label>
                        <div class="col-sm-8">
                            <select name="status" class="form-control">
                                <option value="placed">Placed</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="delivered">Delivered</option>
                            </select>
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
    $('#datatable').DataTable();

    //Buttons examples
    var table = $('#order_table').DataTable({
        lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    
} );
</script>
<script>
     $(document).on('click','#add_order_button ',function(e) {
        $('#add_order_modal').modal('show');
    });
    $( document ).ready(function() {
        $('#is_new_customer').click(function () {
            var checked= $("#is_new_customer").is(":checked");
        console.log(checked);
        if (checked) {
            $('#new_user_section').removeClass("d-none" );
            $('#select_customer_div').addClass("d-none" );
        }
        else{
            $('#new_user_section').addClass("d-none" );
            $('#select_customer_div').removeClass("d-none" );
        }
    });
});
</script>
<script>
    $(document).on('submit','#add_order_form',function(e) {
           e.preventDefault();
           if ($(this).validate().form()) {
  // do ajax stuff
}
           console.log('submitted');
               $.ajax({
                   url: "{{route('admin.order.store')}}",
                 type: "post", 
                 async: true,
                 data: new FormData(this),
                 processData: false,
                 contentType: false,
                 beforeSend: function() {
              
                 },
                   success: function(data) {
                    if (data.success==true){
                        location.reload();
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
                    console.log( JSON.stringify(data) );
                    console.log(data.status);
                   
                    
                     }
               });
             
    });
    $(document).on('click','.delete-order ',function(e) {
        // var id = $(this).data('id');
        var tr = $(this).closest('tr');
        var id = tr.data('id');
       console.log(id);
               $.ajax({
                 type : "get",
                 url : "{{route('admin.order.destroy')}}",
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
            $(document).on('change','.order-status ',function(e) {
               var tr = $(this).closest('tr');
               var id = tr.data('id');
               console.log(id);
               var status = $(this).val();
               console.log(status);
               $.ajax({
                 type : "get",
                 url : "{{route('admin.order.statuschange')}}",
                 data: {
                         id:id,
                         status:status,
                       },
                 dataType:'JSON',
                 beforeSend: function() {
              
                 },
                   success: function(data) {
                    if (data.success==true) {
                      toastr.success("Deleted Successfully");
                    //   tr.fadeOut(1000, function(){
                    //         $(this).remove();
                    //     });
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