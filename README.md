# Custom CMS and blog

A custom CMS and blog made with PHP, Composer, templates using Twig, Bootstrap, phroute, some Eloquent for DB and SQL to store the posts. Mostly to learn all of that and some more.

## Installation

Needs PHP 7.0 or later + MySQL + Apache (developed under MAMP) and [Composer which you can install locally](https://getcomposer.org/download/) (.phar file).

Download the project and install dependencies with Composer:
```
php composer.phar install
```

Setup a MySQL DB with two tables (blogposts and users):
```
CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `img_url` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
);

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
);
```

Setup the enviroment variables to be able to connect to the database (for dev/testing uses phpdotenv package) with a .env file:
```
DB_HOST=localhost
DB_NAME=mydbname
DB_USER=mydbuser
DB_PASS=mydbpassword
```
This is handled in public/index.php.

To be able to post and see the admin pages is necessary a user, you can create one at the moment of setting up the database (user: admin, password: admin):
```
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'test@test.test', '$2y$10$hXItAYaBAV7auIHz/1oe7euUEOMOkoEemD.KS1xMqoLV5rRVkZ1ii', '2017-07-31 18:17:36', '2017-07-31 18:17:36');
```
[A backup of the database used at time of development if needed](https://gist.github.com/jProgr/d4dd763feb308655f24f1f4d66fde8bc).

## License

Uncopyrighted.
