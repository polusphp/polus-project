<?php

namespace App;

class App extends \Polus\App
{
    protected $modeMap = [
        'test' => 'App\_Config\Test',
        'staging' => 'App\_Config\Staging',
        'production' => 'App\_Config\Production',
        'development' => 'App\_Config\Development',
    ];

    public function __construct($mode = 'development')
    {
        parent::__construct('App', $mode);

        $this->registerController('App\Actions\ViewIndex');
    }
}
