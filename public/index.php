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

    $router->get('/admin', function ()
    {
        return render('../views/admin/index.php');
    });

    $router->get('/admin/posts', function () use ($pdo)
    {
        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
        $query->execute();

        $blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);

        return render('../views/admin/posts.php', ['blogPosts' => $blogPosts]);
    });

    $router->get('/admin/posts/create', function ()
    {
        return render('../views/admin/insert-post.php');
    });
    $router->post('/admin/posts/create', function () use ($pdo)
    {
        $sql_query = 'INSERT INTO blog_posts (title, content) VALUES (:title, :content)';
        $query = $pdo->prepare($sql_query);
        $result = $query->execute(
        [
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);
        

        return render('../views/admin/insert-post.php', ['result' => $result]);
    });

    $router->get('/', function () use ($pdo)
    {
        // Main page
        // Gets blogposts from DB and prints them
        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
        $query->execute();

        $blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);
        return render('../views/index.php', ['blogPosts' => $blogPosts]);
    });

    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

    echo $response;
?>