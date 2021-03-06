<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;
class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
      return view('backend.pages.login');
    }
    public function login(Request $request)
    {
        
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
    //   dd($request->all());
    // dd(Auth::guard('admin'));
      // Attempt to log the user in
    //   $try = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password,'is_admin' => 1]);
    //   dd($try);
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password,'is_admin' => 1])) {
        // if successful, then redirect to their intended location
        // dd('ok');
        return redirect()->intended(route('admin.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        // return redirect('/admin');
        return redirect()->intended(route('admin.login'));
    }
}
