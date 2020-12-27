<?php

namespace App\Http\Controllers;

use App\Models\Psot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         //$id = Auth::id();

        // if(Gate::forUser(User::find($id))->allows('only-user')){
       
        //  $post = Psot::where('user_id',$id)->get();
        //  return view('home',compact('post'));
        // }


////////////////////////////////////


        // $post = Psot::get();


        // return Gate::check('only-admin') 

        //     ?  view('home',compact('post'))
            
        //     :  'hyguyhgu' ;


//////////////////////////////////

        // $post = Psot::get();

        // $response = Gate::inspect('only-admin');

        // if ($response->allowed()) {
        //     return view('home',compact('post'));
        // } else {
        //     return dd($response->message());
        // }


//////////////////////////////////



        $post = Psot::get();


       return view('home',compact('post'));
    }
}
