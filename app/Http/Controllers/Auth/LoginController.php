<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except(['logout' , 'userLogout']);
    }

        //this fucntions shows loging out as an user.it works like default logout function inside "Illuminate\Foundation\Auth\AuthenticatesUsers"
        //we will name this one "userlogout" if not it will overrwrite the one in the file mentioned above
        public function userLogout()
        {
            Auth::guard('web')->logout();
    
            /**
             * if you unrem this line it will invalid the entire session,means if you are 
             * logged in as both admin and user at same time it will kick u out of both 
             */
            // $request->session()->invalidate();
    
            return redirect('/');
        }
}
