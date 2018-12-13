<?php

namespace Harlekoy\EventDriven;

use Illuminate\Support\ServiceProvider;

class EventDrivenServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'harlekoy');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'harlekoy');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/eventdriven.php', 'eventdriven');

        // Register the service the package provides.
        $this->app->singleton('eventdriven', function ($app) {
            return new EventDriven;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['eventdriven'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/eventdriven.php' => config_path('eventdriven.php'),
        ], 'eventdriven.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/harlekoy'),
        ], 'eventdriven.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/harlekoy'),
        ], 'eventdriven.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/harlekoy'),
        ], 'eventdriven.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
