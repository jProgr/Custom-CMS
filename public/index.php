<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once '../vendor/autoload.php';
    include_once '../config.php';

    // Gets base url
    $baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    $baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
    define('BASE_URL', $baseUrl);

    $route = isset($_GET['route'])?$_GET['route']:'/';  //$route = $_GET['route'] ?? '/'; // If $_GET['route'] is defined then $route =  $_GET['route'], otherwise equals '/'
    
    function render($fileName, $params = [])
    {
        ob_start();
        extract($params);
        include $fileName;
        return ob_get_clean();
    }

    use Phroute\Phroute\RouteCollector;
    $router = new RouteCollector();

    // Routes

    $router->controller('/admin', App\Controllers\Admin\IndexController::class);
    $router->controller('/admin/posts', App\Controllers\Admin\PostController::class);
    $router->controller('/', App\Controllers\IndexController::class);

    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

    echo $response;
?>