<?php

$token = urldecode(trim(strip_tags(filter_input(INPUT_POST, 'token', FILTER_DEFAULT))));
$id_user = urldecode(trim(strip_tags(filter_input(INPUT_POST, 'id_user', FILTER_DEFAULT))));
$key_acess = urldecode(trim(strip_tags(filter_input(INPUT_POST, 'key_acess', FILTER_DEFAULT))));


$token = trim(strip_tags(filter_input(INPUT_POST,'token',FILTER_DEFAULT)));
$id_user = trim(strip_tags(filter_input(INPUT_POST,'id_user',FILTER_DEFAULT)));
$key_acess = trim(strip_tags(filter_input(INPUT_POST,'key_acess',FILTER_DEFAULT)));


$API = new API;
$API->ID_user($id_user);
$API->Key_acess($key_acess);
$API->Token($token);

echo $chamados = $API->listChamados();