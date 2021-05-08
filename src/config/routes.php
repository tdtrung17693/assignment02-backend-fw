<?php
/** @var Router $router Application's router */

use Controllers\AdminController;
use Controllers\CareersController;
use Controllers\ContactController;
use Controllers\HomeController;
use Controllers\ErrorController;
use Controllers\AuthController;
use Controllers\NewsController;
use Controllers\ProductsController;
use Controllers\ServicesController;
use Middleware\AuthMiddleware;

$router->get('/', HomeController::class, 'index');
$router->get('/products', ProductsController::class, 'index');
$router->get('/products/:id', ProductsController::class, 'show');
$router->get('/services', ServicesController::class, 'index');
$router->get('/about-us', HomeController::class, 'aboutUs');
$router->get('/news', NewsController::class, 'index');
$router->get('/contact', ContactController::class, 'index');
$router->get('/careers', CareersController::class, 'index');
// Uncomment when needing guard
//$router->get('/admin', AdminController::class, 'index')->middleware(AuthMiddleware::class);
$router->get('/admin', AdminController::class, 'index');

$router->get('/login', AuthController::class, 'login');
$router->get('/logout', AuthController::class, 'logout');
$router->get('/404', ErrorController::class, 'error_404');
$router->get('/403', ErrorController::class, 'error_403');
