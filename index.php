<?php
session_start();
require_once __DIR__ . "/env.php";
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/app/helpers/handler.php";


$url = $_GET['url'] ?? '';
// echo $url;

use Phroute\Phroute\RouteCollector;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\Admin\AdminController;

$router = new RouteCollector();

$router->get('/', [HomeController::class, 'index']);
$router->get('/listPost', [HomeController::class, 'listPost']);
$router->get('/listPost/{id}', [HomeController::class, 'listPostCategory']);
$router->get('/aboutUs', [HomeController::class, 'aboutUs']);
$router->get('/contact', [HomeController::class, 'contact']);
$router->get('/detailPost/{id}', [HomeController::class, 'detailPost']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'postLogin']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'store']);
$router->get('/logout', [AuthController::class, 'logout']);


// ADMIN

$router->filter('admin', function () {
    if (!isset($_SESSION['user']) || $_SESSION['user']->role != 'admin') {
        redirect('login');
    }
});

// Nhóm route cho Admin
$router->group(['before' => 'admin'], function ($router) {
    $router->group(['prefix' => 'admin'], function ($router) {
        $router->get('/', [AdminController::class, 'dashboard']);

        $router->get('/listPostAdmin', [AdminController::class, 'listPostAdmin']);
        $router->get('/listPostAdmin/add', [AdminController::class, 'add']);
        $router->post('/listPostAdmin/add', [AdminController::class, 'store']);
        $router->get('/listPostAdmin/edit/{id}', [AdminController::class, 'edit']);
        $router->post('/listPostAdmin/edit/{id}', [AdminController::class, 'update']);
        $router->post('/listPostAdmin/delete/{id}', [AdminController::class, 'destroy']);
        // $router->post('/detailPostAdmin/{id}', [AdminController::class, 'detailPostAdmin']);

        $router->get('/listCategoryPostAdmin', [AdminController::class, 'listCategoryPostAdmin']);
        $router->get('/listCategoryPostAdmin/add', [AdminController::class, 'addCategory']);
        $router->post('/listCategoryPostAdmin/add', [AdminController::class, 'storeCategory']);
        $router->get('/listCategoryPostAdmin/edit/{id}', [AdminController::class, 'editCategory']);
        $router->post('/listCategoryPostAdmin/edit/{id}', [AdminController::class, 'updateCategory']);
        $router->post('/listCategoryPostAdmin/delete/{id}', [AdminController::class, 'destroyCategory']);

        $router->get('/listUser', [AdminController::class, 'listUser']);
        $router->get('/accounts/add', [AdminController::class, 'addUser']);
        $router->post('/accounts/add', [AdminController::class, 'storeUser']);
        $router->get('/accounts/edit/{id}', [AdminController::class, 'editUser']);
        $router->post('/accounts/edit/{id}', [AdminController::class, 'updateUser']);
        $router->post('/accounts/delete/{id}', [AdminController::class, 'banUser']);
        $router->post('/accounts/unban/{id}', [AdminController::class, 'unBanUser']);

        // $router->get('/detailPostAdmin', [AdminController::class, 'detailPostAdmin']);
    });
});


try {
    # NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

    // Print out the value returned from the dispatched function
    echo $response;
} catch (\Phroute\Phroute\Exception\HttpException $ex) {
    echo '404 NOT FOUND';
}
