<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Horizon;
use Laravel\Telescope\Telescope;
use Studio\Totem\Totem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Totem::auth(function($request) {
            return Auth::guard('admins')->check();
        });

        Horizon::auth(function ($request) {
            return Auth::guard('admins')->check();
        });

        Telescope::auth(function ($request) {
            return Auth::guard('admins')->check();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \Auth0\Login\Contract\Auth0UserRepository::class,
            \App\Repository\UserRepository::class
        );
    }
}
