<?php
require_once 'core/Core.php';

require_once '../lib/Database/Connection.php';

require_once 'controller/HomeController.php';
require_once 'controller/ErroController.php';
require_once 'model/Postagem.php';

require_once '../vendor/autoload.php';


$template = file_get_contents('template/estrutura.html');

ob_start();
    $core = new Core;
    $core->start($_GET);

    $saida= ob_get_contents();
ob_end_clean();

$templatePronto = str_replace('{{area_dinamica}}', $saida, $template);
echo $templatePronto;