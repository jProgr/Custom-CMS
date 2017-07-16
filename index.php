<!DOCTYPE html>
<?php
    include_once 'config.php';

    $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
    $query->execute();

    $blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>Title</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">

                <!-- Prints blog posts obtained from database -->
                <?php foreach ($blogPosts as $blogPost): ?>
                        <div class="blog-post">
                            <h2><?=$blogPost['title']?></h2>
                            <p><a href="">by Alex</a> on XX/XX/XXXX</p>
                            <div class="blog-post-image">
                                <img src="images/placeholder_img.jpg" alt="">
                            </div>
                            <div class="blog-post-content">
                                <?=$blogPost['content']?>
                            </div>
                        </div>
                <?php endforeach ?>

            </div>
            <div class="col-md-4">
                Jackie Chan DC Racing, formerly known as DC Racing, is a racing team that currently competes in the FIA World Endurance Championship and Asian Le Mans Series. The team is co-owned by Asian Le Mans champion David Cheng and actor Jackie Chan. Partnering with Jota Sport in WEC, the team fields two Oreca 07s: the No. 37 for Cheng, Alex Brundle and Tristan Gommendy, and the No. 38 for Ho-Pin Tung, Thomas Laurent and Oliver Jarvis.
            </div>
        </div>

        <div class="row">
            <footer>
                Footer
            </footer>
        </div>

    </div>
</body>
</html>