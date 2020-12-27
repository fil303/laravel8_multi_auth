<?php

namespace App\Providers;

use App\Models\Psot;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('sub', function(User $user){
            return Auth::user()->role_id === 2 ;
        });


    // copy from laravel doc
        
        Gate::before(function ($user, $ability) {
         if ($user->role_id == 1) {
            return true;
            }
        });
/////////



        Gate::define('user', function($user,Psot $psot){

            return Auth::user()->role_id === $psot->user->role_id  ;

        });




        Gate::define('only-user', function(User $user){

            return $user->role_id == 2  ;

        });




        Gate::define('res-user', function(User $user){
            return $user->role_id == 1
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });




        Gate::define('admin', function($user,Psot $psot){

            return Auth::user()->role_id === $psot->user->role_id  ;

        });





        Gate::define('only-admin', function(User $user){

            return $user->role_id == 1  ;

        });
    }
}
