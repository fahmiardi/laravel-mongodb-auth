<?php

namespace Fahmiardi\Laravel\Mongodb\Auth;

use Jenssegers\Mongodb\Auth\DatabaseTokenRepository;
use Jenssegers\Mongodb\Auth\PasswordBrokerManager as BasePasswordBrokerManager;

class PasswordBrokerManager extends BasePasswordBrokerManager
{
    /**
     * Create a token repository instance based on the given configuration.
     *
     * @param  array  $config
     * @return \Illuminate\Auth\Passwords\TokenRepositoryInterface
     */
    protected function createTokenRepository(array $config)
    {
        $connection = isset($config['connection']) ? $config['connection'] : null;

        return new DatabaseTokenRepository(
            $this->app['db']->connection($connection),
            $config['table'],
            $this->app['config']['app.key'],
            $config['expire']
        );
    }
}
