<?php

use App\Http\Controllers\JiriController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;

/** @var Core\Router $router */
$router->get('/', [JiriController::class, 'index']);

$router->get('/jiris', [JiriController::class, 'index']);

$router->get('/jiri', [JiriController::class, 'show']);

$router->get('/jiri/create', [JiriController::class, 'create']);
$router->post('/jiri', [JiriController::class, 'store'])->csrf();

$router->get('/jiri/edit', [JiriController::class, 'edit']);
$router->patch('/jiri', [JiriController::class, 'update'])->csrf();


$router->delete('/jiri', [JiriController::class, 'destroy'])->csrf();


// interro
$router->get('/login', [AuthenticatedSessionController::class, 'show']);
$router->post('/login', [AuthenticatedSessionController::class, 'create']);


$router->get('/register', [RegisteredUserController::class, 'show']);
$router->post('/register', [RegisteredUserController::class, 'store']);
