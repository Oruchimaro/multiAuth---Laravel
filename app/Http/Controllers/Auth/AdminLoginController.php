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
        /**we need to define a disclaimer 
         * in order to make our custum logout function work
         * otherwise because the logout function is locked into the guest middleware
         * we need to be logged out to log out , LOL !!!
         * so we will add a except and add the function logout to it to tell apply middlware on everything
         * except the logout function 
         */
        $this->middleware('guest:admin' , ['except' => ['logout']]);
        //if that one doesnt work this one should
        // $this->middleware('guest:admin')->except(['logout' , 'userLogout']);

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

    //this fucntions shows loging out as an admin.it works like default logout function inside "Illuminate\Foundation\Auth\AuthenticatesUsers"
    public function logout()
    {
        Auth::guard('admin')->logout();

        /**
         * if you unrem this line it will invalid the entire session,means if you are 
         * logged in as both admin and user at same time it will kick u out of both 
         */
        // $request->session()->invalidate();

        return redirect('/');
    }
}
