<?php

class HomeController
{
    public function index()
    {
        try {
            //using twig to load the view
            $loader = new \Twig\Loader\FilesystemLoader('view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');
            
            $collectionPosts = Postagem::selectAll();

            $params = array();
            $params['posts'] = $collectionPosts;

            //render the template(home.html) with the params($collectionPosts)
            $content = $template->render($params);
            echo($content);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
