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
// $router->post('/login', AuthController::class, 'doLogin');
$router->post('/checkForgotpw', AuthController::class, 'checkForgotpw');
$router->get('/info', AuthController::class, 'userInfo');
$router->get('/changePass', AuthController::class, 'changePassView');

$router->post('/checkChangePass', AuthController::class, 'checkChangePass');

$router->post('/doChangePass', AuthController::class, 'doChangePass');
$router->post('/doChangeInfo', AuthController::class, 'doChangeInfo');





// Uncomment when needing guard
//$router->get('/admin', AdminController::class, 'index')->middleware(AuthMiddleware::class);
$router->get('/admin', AdminController::class, 'index');
$router->get('/admin/products', AdminProductsController::class, 'index');
$router->get('/admin/products/:id', AdminProductsController::class, 'show');
$router->post('/admin/products/:id/images', AdminProductsController::class, 'createProductImage');

$router->get('/404', ErrorController::class, 'error_404');
$router->get('/403', ErrorController::class, 'error_403');
