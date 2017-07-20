<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once '../config.php';

    $route = isset($_GET['route'])?$_GET['route']:'/';  //$route = $_GET['route'] ?? '/'; // If $_GET['route'] is defined then $route =  $_GET['route'], otherwise equals '/'
    switch ($route)
    {
        case '/':
            require '../index.php';
            break;
        case '/admin':
            require '../admin/index.php';
            break;
        case '/admin/posts':
            require '../admin/posts.php';
            break;
    }
?>