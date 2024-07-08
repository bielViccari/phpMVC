<?php

class PostController
{
    public function index($params)
    {
        try {
            //using twig to load the view
            $loader = new \Twig\Loader\FilesystemLoader('view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');
            
            $singlePost = Postagem::selectById($params);
            var_dump($singlePost);
            $post = array();
            $post['titulo'] = $singlePost->titulo;
            $post['conteudo'] = $singlePost->conteudo;

            //render the template(single.html) with the params($singlePost)
            $content = $template->render($post);
            echo $content;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}