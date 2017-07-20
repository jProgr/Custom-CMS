<!DOCTYPE html>
<?php
    $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
    $query->execute();

    $blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Admin</title>
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
                <h2>Posts</h2>
                <a class="btn btn-primary" href="insert-post.php">New post</a>
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <!-- Prints list of blogposts from DB -->
                    <?php foreach ($blogPosts as $blogPost): ?>
                        <tr>
                            <td><?=$blogPost['title']?></td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    <?php endforeach ?>
                    
                </table>
            </div>
            <div class="col-md-4">
                Jackie Chan DC Racing, formerly known as DC Racing, is a racing team that currently competes in the FIA World Endurance Championship and Asian Le Mans Series. The team is co-owned by Asian Le Mans champion David Cheng and actor Jackie Chan. Partnering with Jota Sport in WEC, the team fields two Oreca 07s: the No. 37 for Cheng, Alex Brundle and Tristan Gommendy, and the No. 38 for Ho-Pin Tung, Thomas Laurent and Oliver Jarvis.
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <footer>
                    Footer<br />
                    <a href="admin/index.php">Admin panel</a>
                </footer>
            </div>
        </div>

    </div>
</body>
</html>