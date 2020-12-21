<?php

namespace Illuminate\Foundation\Auth;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }



         if(Auth::check() && Auth::user()->role_id == 1){
          
             return property_exists($this, 'redirectTo') ? RouteServiceProvider::AHOME :RouteServiceProvider::AHOME;
        } elseif(Auth::check() && Auth::user()->role_id == 2){
            return property_exists($this, 'redirectTo') ? RouteServiceProvider::UHOME : RouteServiceProvider::UHOME;
        }




       //  Dorkari kisu  ---   $this->redirectTo


       // return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
