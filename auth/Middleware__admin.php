<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->exists('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')) {
            return  redirect('home');
        }
        return $next($request);
    }
}
