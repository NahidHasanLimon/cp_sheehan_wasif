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
        @if(!Auth::check())
      
        <div class="col-lg-8 p-5" id="login_signup_main_div">
          <div class="alert alert-info text-success" style="display: none"></div>
          <div class="alert alert-error text-danger" style="display: none"></div>
           <div class="print-error-msg text-danger" >
                 <ul></ul>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-4 pr-2" id="login_div">
                      <form  method="post" id="login_form">
                        @csrf
                        <label for="">Email</label>
                      <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" placeholder="email" class="form-control border-left-0 required" name="email" id="email_login_input">
                      </div>
                      <label for="">Password</label>
                    <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="text"  placeholder="password" class="form-control border-left-0 required" name="password" id="password_login_input">
                      </div>
                      <button type="submit" class="btn-sm btn-primary float-right mt-4">Login</button>
                      </form>
                </div>
                <div class="col-lg-6  mt-4" id="signup_div">
                    <form  method="post" id="signup_form">
                      @csrf
                      <label for="">Full Name</label>
                    <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" placeholder="full name" class="form-control border-left-0" name="full_name" id="full_name_signup_input">
                      </div>
                      <label for="">Phone Number</label>
                    <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="text"  placeholder="phone number" class="form-control border-left-0 required" name="phone_number" id="phone_number_signup_input">
                      </div>
                      <label for="">Email</label>
                      <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" placeholder="email" class="form-control border-left-0 required" name="email" id="email_signup_input">
                      </div>
                      <label for="">Password</label>
                    <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="text"  placeholder="password" class="form-control border-left-0 required" name="password" id="password_signup_input">
                      </div>
                      <label for="">Confirm Password</label>
                      <div class="input-group input-focus">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                          </div>
                          <input type="text"  placeholder="password" class="form-control border-left-0 required" name="confirm_password" id="confirm_password_signup_input">
                        </div>
                      <button type="submit" class="btn-sm btn-primary float-right mt-4">SignUp</button>
                    </form>
                </div>
                
                {{-- end of sign in sign up div  --}}
            </div>
        </div>
        @else
        <div class="col-lg-8 p-5" id="confirm_order_div">
          <h4 class="text-center">CUSTOMER ORDER FORM</h4>
          <div class="alert alert-info text-success" style="display: none"></div>
          <div class="alert alert-error text-danger" style="display: none"></div>
           <div class="print-error-msg text-danger" >
                 <ul></ul>
            </div>
          <form action="" method="post" id="order_form">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Name</label>
                <div class="input-group input-focus">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" placeholder="full name" class="form-control border-left-0" value="{{Auth::user()->full_name}}" name="full_name" id="full_name_input" readonly>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Phone Number</label>
                <div class="input-group input-focus">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                  </div>
                  <input type="text"  placeholder="phone number" class="form-control border-left-0 required" value="{{Auth::user()->phone_number}}" name="phone_number" id="phone_number_input" readonly>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Area</label>
                <div class="input-group input-focus">
                  <select  class="form-control required" name="area_id" id="area_id_input">
                      @foreach ($areas as $area)
                          <option value="{{$area->id}}">{{$area->name}}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Shipping Address</label>
                <div class="input-group input-focus">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-white"><i class="fas fa-address-book"></i></span>
                  </div>
                  <input type="text" placeholder="address" class="form-control border-left-0 required" value="mirpur" name="address" id="address_input">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Product</label>
                <div class="input-group input-focus">
                  <select  class="form-control required" name="product_id" id="select_product_input">
                      @if(!empty($products))
                          @foreach ($products as $product)
                              <option value="{{$product->id}}">{{$product->name}}</option>
                          @endforeach
                      @endif
                  </select>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Quantity</label>
                <div class="input-group input-focus">
                  <input type="number" value="1" min="1" class="form-control required" name="quantity" id="quantity_input">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-md btn-primary float-right" >Confirm Order</button>
            
          </form>
      </div>
        @endif
    </div><!-- /Row -->
</div>
@endsection