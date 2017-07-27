<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\BlogPost;

    class IndexController extends BaseController
    {
        public function getIndex()
        {
            // Gets posts from DB
            $blogPosts = BlogPost::query()->orderBy('id', 'desc')->get();

            return $this->render('index.twig', ['blogPosts' => $blogPosts]);
        }
    }
?>