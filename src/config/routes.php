<?php
/** @var Router $router Application's router */

use Controllers\HomeController;
use Controllers\ErrorController;
use Controllers\AuthController;
use Middleware\AuthMiddleware;

$router->get('/', HomeController::class, 'index')->middleware(new AuthMiddleware());
$router->get('/login', AuthController::class, 'login');
$router->get('/404', ErrorController::class, 'error_404');