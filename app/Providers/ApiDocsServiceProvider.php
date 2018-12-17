<?php

namespace App\Providers;

use Harlekoy\ApiDocs\Providers\ApiDocsApplicationServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApiDocsServiceProvider extends ApiDocsApplicationServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewApiDocs', function ($user) {
            return Auth::guard('admins')->check();
        });
    }
}
