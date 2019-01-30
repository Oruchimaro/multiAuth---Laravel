<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        //defining the guard for this controller
        $this->middleware('guest:admin');
    }

    //this functions returns the login form for admins
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    //this function will do the actuall loging in 
    public function login(Request $request)
    {
        //step1 : validate form data 
        $this->validate($request,[
            'email' => 'required|email',
            'password' =>'required|min:6'
        ]);
        //step2 : attempt to login the user
        /**
         * we are using the "Auth::attempt" method as
         *  it is in the default login controller.
         */
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password] , $request->remember))
        {
        //step3 :if successful redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        //step4 : if unsuccessful redirect back to login with form data
        return redirect()->back()->withInput($request->only('email','remember'));

    }
}
