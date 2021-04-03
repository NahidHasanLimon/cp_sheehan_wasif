<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\User;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        // dd(Auth::check());

        // $this->middleware('guest')->except('logout');
    }
    public function storeCustomerLogin(Request $request){
        // dd('got_it');
        $rules = array('email' => 'required|max:155', 'password' => 'required');
        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400); // 400 being the HTTP code for an invalid request.
        }

        $email = $request->email;
       $user = User::where('email',$email)->first();
       if($user){
                            $credentials = $request->only('email', 'password');
                            if (Auth::attempt($credentials)) {
                                    return response()->json([
                                        'success'=> true,
                                        'message' => 'Login Successfully!',
                                       ]);
                                     
                                 }
                            else{
                                return response()->json([
                                    'success'=> false,
                                    'message' => 'Login failed!',
                                   ]);
                            } 
               }else{ 
                   return response()->json([
                'success'=> false,
                'message' => 'Login failed!',
               ]);
               }
    }
    public function signup(Request $request){
        // dd('signup method');
        $rules = array('full_name' => 'required|max:155', 'password' => 'required','email' => 'required|email|unique:users|max:255','phone_number' => 'required|unique:users|max:15');
        $validator = Validator::make($request->all(), $rules);
        // Validate the input and return correct response
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400); // 400 being the HTTP code for an invalid request.
        }
        
        $create_user =  User::create([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($create_user){
            // dd('Created successfully');
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                    return response()->json([
                        'success'=> true,
                        'message' => 'Login Successfully!',
                       ]);
                     
                 }
            else{
                return response()->json([
                    'success'=> false,
                    'message' => 'Login failed!',
                   ]);
            } 
        }
        

    }
}
