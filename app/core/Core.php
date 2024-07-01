<?php

class Core
{
    public function start($urLGet)
    {
        $acao = 'index';
        
        if(isset($urLGet['pagina'])) {
            $controller = ucfirst($urLGet['pagina'].'controller');
        } else {
            $controller = 'HomeController';
        }

        if(!class_exists($controller)) {
            $controller = 'ErroController';
        }
        
        call_user_func_array(array(new $controller, $acao),array());
    }
}