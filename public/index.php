<?php

const BASE_PATH = __DIR__.'/..';
require BASE_PATH.'/core/helpers/functions.php';

require base_path('vendor/autoload.php');

$controller_name = \App\Http\Controllers\JiriController::class;
$method_name = 'index';

$controller = new $controller_name();
$controller->{$method_name}();


