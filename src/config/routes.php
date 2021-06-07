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
use Controllers\Admin\ProductsController as AdminProductsController;
use Controllers\Admin\UsersController as AdminUsersController;

$router->get('/', HomeController::class, 'index');
$router->get('/products', ProductsController::class, 'index');
$router->post('/products/search', ProductsController::class, 'search');
$router->get('/products/:id', ProductsController::class, 'show');
$router->post('/products/comment', ProductsController::class, 'postComment');
$router->get('/services', ServicesController::class, 'index');
$router->get('/about-us', HomeController::class, 'aboutUs');
$router->get('/news', NewsController::class, 'index');
$router->get('/news/detail', NewsController::class, 'show');
$router->get('/contact', ContactController::class, 'index');
$router->get('/careers', CareersController::class, 'index');

$router->get('/login1', AuthController::class, 'login');
$router->get('/register', AuthController::class, 'register');
$router->get('/forgotpw', AuthController::class, 'forgotpw');
$router->post('/checkRegister', AuthController::class, 'checkRegister');
$router->post('/sendRegister', AuthController::class, 'sendRegister');
$router->post('/doLogin', AuthController::class, 'doLogin');
$router->get('/logout', AuthController::class, 'logout');
$router->post('/login', AuthController::class, 'doLogin');
$router->post('/checkForgotpw', AuthController::class, 'checkForgotpw');





// Uncomment when needing guard
//$router->get('/admin', AdminController::class, 'index')->middleware(AuthMiddleware::class);
$router->get('/admin', AdminController::class, 'index');
$router->get('/admin/products', AdminProductsController::class, 'index');
$router->get('/admin/products/new', AdminProductsController::class, 'create');
$router->get('/admin/products/:id', AdminProductsController::class, 'show');
$router->post('/admin/products', AdminProductsController::class, 'store');
$router->post('/admin/products/:id/images', AdminProductsController::class, 'createProductImage');
$router->put('/admin/products/:id', AdminProductsController::class, 'update');
$router->delete('/admin/products/:id', AdminProductsController::class, 'delete');
$router->delete('/admin/products/:id/images/:imgId', AdminProductsController::class, 'deleteProductImage');

// Admin Users
$router->get('/admin/users', AdminUsersController::class, 'index');
$router->get('/admin/users/:id', AdminUsersController::class, 'show');

$router->get('/404', ErrorController::class, 'error_404');
$router->get('/403', ErrorController::class, 'error_403');
