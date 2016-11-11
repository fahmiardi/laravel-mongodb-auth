<?php

namespace Fahmiardi\Laravel\Mongodb\Auth;

use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider as BasePasswordResetServiceProvider;

class PasswordResetServiceProvider extends BasePasswordResetServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }
    }

    /**
     * Register the password broker instance.
     *
     * @return void
     */
    protected function registerPasswordBroker()
    {
        $this->app->singleton('auth.password', function ($app) {
            return new PasswordBrokerManager($app);
        });

        $this->app->bind('auth.password.broker', function ($app) {
            return $app->make('auth.password')->broker();
        });
    }

    /**
     * Register Auth's migration files.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        return $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}