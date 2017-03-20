<?php
date_default_timezone_set('UTC');

require '../vendor/autoload.php';

use App\App;

$app = new App();
$app->run();
