<?php

namespace App\_Config;

use Aura\Di\Config;
use Aura\Di\Container;
use Monolog\Logger;

class Development extends Config
{
    public function define(Container $di)
    {
        $base = dirname(dirname(dirname(__DIR__)));
        $di->set('mode:middlewares:preRouter', function () use ($di) {
            return [
                $di->newInstance('RKA\Middleware\IpAddress'),
            ];
        });

        $di->setter['Blueprint\Extended']['setBasePath'] = [
            $base . '/templates/',
        ];
        $di->types['Blueprint\ITemplate'] = $di->lazyNew('Blueprint\Extended');

        $di->params['Monolog\Handler\StreamHandler']['level'] = Logger::DEBUG;
        $di->params['Monolog\Formatter\LogstashFormatter']['applicationName'] = 'development';
    }
}
