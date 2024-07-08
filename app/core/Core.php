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
        
        if(isset($urLGet['id']) && $urLGet['id'] != null){
            $id = $urLGet['id'];
        } else {
            $id = null;
        }

        // Ajustar a chamada de call_user_func_array para passar os parâmetros sem nomes
        call_user_func_array(array(new $controller, $acao), array($id));
    }
}