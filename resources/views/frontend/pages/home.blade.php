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
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6 mt-4 pr-2">
                      <label for="">Email</label>
                      <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" placeholder="email" class="form-control border-left-0 required" name="email_login" id="email_login_input">
                      </div>
                      <label for="">Password</label>
                    <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="text"  placeholder="password" class="form-control border-left-0 required" name="password_login" id="password_login_input">
                      </div>
                      <button type="submit" class="btn-sm btn-primary float-right mt-4">Login</button>
                </div>
                <div class="col-lg-6  mt-4">
                    <label for="">Full Name</label>
                    <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" placeholder="full name" class="form-control border-left-0" name="full_name_signup" id="full_name_signup_input">
                      </div>
                      <label for="">Phone Number</label>
                    <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="text"  placeholder="phone number" class="form-control border-left-0 required" name="phone_number_signup" id="phone_number_signup_input">
                      </div>
                      <label for="">Email</label>
                      <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" placeholder="email" class="form-control border-left-0 required" name="email_signup" id="email_signup_input">
                      </div>
                      <label for="">Password</label>
                    <div class="input-group input-focus">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="text"  placeholder="password" class="form-control border-left-0 required" name="password_signup" id="password_signup_input">
                      </div>
                      <button type="submit" class="btn-sm btn-primary float-right mt-4">SignUp</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8 d-none">
            <div id="wizard_container">
                <div id="top-wizard">
                    <div id="progressbar"></div>
                    <span id="location"></span>
                </div>
                <!-- /top-wizard -->
                <form id="wrapped" method="post"> <!-- /step-->
                    <input id="website" name="website" type="text" value="">
                    <!-- Leave for security protection, read docs for details -->
                    <div id="middle-wizard">

                        {{-- <div class="step">
                            <h3 class="text-center">Welcome</h3>
                            <div class="row">
                                <div class="col-lg-6 mt-4 pr-2">
                                      <label for="">Email</label>
                                      <div class="input-group input-focus">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        <input type="email" placeholder="email" class="form-control border-left-0 required" name="email_login" id="email_login_input">
                                      </div>
                                      <label for="">Password</label>
                                    <div class="input-group input-focus">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                                        </div>
                                        <input type="text"  placeholder="password" class="form-control border-left-0 required" name="password_login" id="password_login_input">
                                      </div>
                                      <button type="submit" class="btn-sm btn-primary float-right mt-4">Login</button>
                                </div>
                                <div class="col-lg-6  mt-4">
                                    <label for="">Full Name</label>
                                    <div class="input-group input-focus">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" placeholder="full name" class="form-control border-left-0" name="full_name_signup" id="full_name_signup_input">
                                      </div>
                                      <label for="">Phone Number</label>
                                    <div class="input-group input-focus">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                                        </div>
                                        <input type="text"  placeholder="phone number" class="form-control border-left-0 required" name="phone_number_signup" id="phone_number_signup_input">
                                      </div>
                                      <label for="">Email</label>
                                      <div class="input-group input-focus">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        <input type="email" placeholder="email" class="form-control border-left-0 required" name="email_signup" id="email_signup_input">
                                      </div>
                                      <label for="">Password</label>
                                    <div class="input-group input-focus">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                                        </div>
                                        <input type="text"  placeholder="password" class="form-control border-left-0 required" name="password_signup" id="password_signup_input">
                                      </div>
                                      <button type="submit" class="btn-sm btn-primary float-right mt-4">SignUp</button>
                                </div>
                            </div>
                            <!-- /row -->
                            
                        </div> --}}
                        <!-- /step-->

                        <div class="submit step" id="end">
                           
                            {{-- <h3 class="main_question"><i class="arrow_right"></i>Have you traveled to any one of the destinations below in the last 21 days?</h3> --}}
                            <h3 class="text-center">Customer Order Form</h3>
                            <div class="row">
                                <div class="col-lg-6  mt-4">
                                    <label for="">Full Name</label>
                                    <div class="input-group input-focus">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" placeholder="full name" class="form-control border-left-0" name="full_name" id="full_name_input">
                                      </div>
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <label for="">Phone Number</label>
                                    <div class="input-group input-focus">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white"><i class="fa fa-phone"></i></span>
                                        </div>
                                        <input type="text"  placeholder="phone number" class="form-control border-left-0 required" name="phone_number" id="phone_number_input">
                                      </div>
                                </div>
                                <div class="col-lg-6  mt-4">
                                    <label for="">Email</label>
                                    <div class="input-group input-focus">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        <input type="email" placeholder="email" class="form-control border-left-0 required" name="email" id="email_input">
                                      </div>
                                </div>
                                <div class="col-lg-6  mt-4" >
                                    <label for="">Area</label>
                                    <div class="input-group input-focus">
                                        <select  class="form-control required" name="area" id="area_input">
                                            <option value="Banani">Banani</option>
                                            <option value="Gulshan">Gulshan</option>
                                            <option value="Niketon">Niketon</option>
                                            <option value="Mirpur">Mirpur</option>
                                            <option value="Uttara">Uttara</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-lg-12  mt-4">
                                    <label for="">Address</label>
                                    <div class="input-group input-focus">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white"><i class="fas fa-address-book"></i></span>
                                        </div>
                                        <input type="text" placeholder="address" class="form-control border-left-0 required" name="address" id="address_input">
                                      </div>
                                </div>
                                <div class="col-lg-6  mt-4" >
                                    <label for="">Select Product</label>
                                    <div class="input-group input-focus">
                                        <select  class="form-control required" name="select_product" id="select_product_input">
                                            <option value="Banani">Banani</option>
                                            <option value="Gulshan">Gulshan</option>
                                            <option value="Niketon">Niketon</option>
                                            <option value="Mirpur">Mirpur</option>
                                            <option value="Uttara">Uttara</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-lg-6  mt-4 mb-4" >
                                    <label for="">Select Quantity</label>
                                    <div class="input-group input-focus">
                                        <input type="number" value="1" min="1" class="form-control required" name="quantity" id="quantity_input">
                                      </div>
                                </div>
                            </div>
                            <!-- /row -->
                            
                        
                        </div>
                        <!-- /step last-->

                    </div>
                    <!-- /middle-wizard -->
                    <div id="bottom-wizard">
                        <button type="button" name="backward" class="backward">Prev</button>
                        <button type="button" name="forward" class="forward">Next</button>
                        <button type="submit" name="process" class="submit">Confirm Order</button>
                    </div>
                    <!-- /bottom-wizard -->
                </form>
            </div>
            <!-- /Wizard container -->
        </div>
    </div><!-- /Row -->
</div>
@endsection