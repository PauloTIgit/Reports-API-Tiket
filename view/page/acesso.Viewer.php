<?php

$token = urldecode(trim(strip_tags(filter_input(INPUT_POST, 'token', FILTER_DEFAULT))));


$API = new API;
$API->Token($token);
$pageRetorno = 'app=dashboad';
// Se o retorno erro for != true ele vai mandar para a pagina $pageRetorno
$API->validarToken($pageRetorno);