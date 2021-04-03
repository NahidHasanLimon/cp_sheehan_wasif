@extends('frontend.layouts.master')
@section('content')
<div id="form_container">
    <div class="row no-gutters">
        <div class="col-lg-4">
            <div id="left_form">
                <figure><img src="{{asset('frontend/img/info_graphic_1.svg')}}" alt="" width="100" height="100"></figure>
                <h2>CORONAVIRUS <span>Questionnaire with Branch</span></h2>
                <p>Help yourself in decision-making whether to seek professional medical advice or not.</p>
                <a href="" class="btn_1 rounded yellow purchase" target="_parent">Purchase this template</a>
                <a href="#wizard_container" class="btn_1 rounded mobile_btn yellow">Start Now!</a>
                <a href="#0" id="more_info" data-toggle="modal" data-target="#more-info"><i class="pe-7s-info"></i></a>
            </div>
        </div>
        @php
            // echo var_dump(Auth::check());
        @endphp
        @if(Auth::check())
      
        <div class="col-lg-8 p-5" id="login_signup_main_div">
          <div class="alert alert-info text-success" style="display: none"></div>
          <div class="alert alert-error text-danger" style="display: none"></div>
           <div class="print-error-msg text-danger" >
                 <ul></ul>
            </div>
            <div class="row">
              <h4 class="text-center">My Orders</h4>
              <div class="table-responsive">
              <table class="table table-responsive" id="order_table">
                <thead>
                  <th>Sl.</th>
                  <th>O. Number</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Area</th>
                  <th>Address</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                      <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $order->identification_number }}</td>
                        <td>
                          {{ \Carbon\Carbon::parse($order->date)->format(' jS  F Y') }}
                        </td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->area->name}}</td>
                        <td>{{$order->address}}</td>
                        {{-- <td>{{$order->product_id}}</td> --}}
                        
                        @foreach ($order->order_items as $order_item)
                        <td>
                            {{$order_item->product->name}}</li>
                        </td>
                        <td>
                         {{$order_item->quantity}}
                       </td>
                        @endforeach
                      {{-- </td> --}}
                      </tr>
                  @endforeach
                </tbody>
              
              </table>
            </div>
            </div>
        </div>
        @endif
    </div><!-- /Row -->
</div>
@endsection
@section('pagejs')
<script>
  $(document).ready( function () {
    $('#order_table').DataTable();
} );
</script>
@endsection