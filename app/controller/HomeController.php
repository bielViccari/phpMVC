<?php

class HomeController
{
    public function index()
    {
        try {
            $collectionPosts = Postagem::selectAll();
            var_dump($collectionPosts);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
