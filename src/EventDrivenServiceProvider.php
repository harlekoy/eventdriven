<?php

namespace Harlekoy\EventDriven;

use Harlekoy\EventDriven\Console\Commands\TraitMakeCommand;
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

        // Registering package commands.
        $this->commands([
            TraitMakeCommand::class,
        ]);
    }
}
