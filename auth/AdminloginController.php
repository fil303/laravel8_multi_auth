<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class AdminloginController extends Controller
{
      use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(Request $request){
    	 $this->validate($request, [
	        'email'   => 'required|email',
	        'password' => 'required|min:6'
    	]);
    if (Auth::guard('admin')->attempt([
	        'email' => $request->email,
	        'password' => $request->password
	    	], $request->get('remember'))) {
	        return redirect()->intended('admin/home');
    	}
    return back()->withInput($request->only('email', 'remember'));
    }



    public function logout(Request $request)
		{
		    Auth::guard('admin')->logout();
		    $request->session()->invalidate();
		    return redirect()->intended('admin/login');
		}
}
