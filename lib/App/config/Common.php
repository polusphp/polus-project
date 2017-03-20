<?php

namespace App\_Config;

use Aura\Di\Config;
use Aura\Di\Container;

class Common extends Config
{
    public function define(Container $di)
    {
        $di->addConfig('Blueprint\_Config\Common');

        $di->params['Monolog\Formatter\LogstashFormatter']['systemName'] = 'Polus project';
    }
}
