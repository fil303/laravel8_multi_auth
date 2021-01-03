<?php

namespace App\Http\Controllers;

use App\Events\PusherEvent;
use Illuminate\Http\Request;

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
        // for($i = 0 ; $i < 3000000 ; $i++){
        //      PusherEvent::dispatch('ja');
        // }
        PusherEvent::dispatch('ja');
        return view('home');
    }
}
