<?php
date_default_timezone_set('UTC');

require '../vendor/autoload.php';

use App\App;
$_SERVER['REQUEST_URI'] = '/';
$app = new App();
$app->run();
