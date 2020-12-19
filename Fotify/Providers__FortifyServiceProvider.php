<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::loginView(fn () => view('auth.login'));

        Fortify::registerView(fn () => view('auth.register'));

        Fortify::verifyEmailView(fn () => view('auth.verify-email'));

        Fortify::requestPasswordResetLinkView(function () {
        return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
        return view('auth.reset-password', ['request' => $request]);
        });

        Fortify::confirmPasswordView(function () {
        return view('auth.confirm-password');
        });

        Fortify::twoFactorChallengeView(function () {
        return view('auth.two-factor-challenge');
        });

        // Fortify::authenticateUsing(function (Request $request) {
        // $user = User::where('email', $request->email)->first();

        // if ($user &&
        //     Hash::check($request->password, $user->password)) {
        //     return $user;
        // }
        // });


        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
    }
}
