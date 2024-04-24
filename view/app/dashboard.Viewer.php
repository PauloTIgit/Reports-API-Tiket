<?php 
$token = urldecode(trim(strip_tags(filter_input(INPUT_POST, 'token', FILTER_DEFAULT))));
$_SESSION['token'] = $token;
// echo $_SESSION['token'];
###### Validar Token informado!
    $API = new API;
    $API->Token($token);
    $resposta_validador = $API->validarToken();
    if($resposta_validador !== true){
        $_SESSION['erro'] = $resposta_validador;
        header('LOCATION: ?page=home');
        die();
    }
require 'view/app/menu.Viewer.php'; ?>
<p>Dashboard</p>