<?php

namespace Fahmiardi\Laravel\Mongodb\Passport;

use Laravel\Passport\PassportServiceProvider as BasePassportServiceProvider;

class PassportServiceProvider extends BasePassportServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if ($this->app->runningInConsole()) {
            $this->updateUserIdMigrations();
        }
    }

    /**
     * Register Passport's migration files.
     *
     * @return void
     */
    protected function updateUserIdMigrations()
    {
        return $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}
