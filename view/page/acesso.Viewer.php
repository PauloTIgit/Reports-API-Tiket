<?php

$token = urldecode(trim(strip_tags(filter_input(INPUT_POST, 'token', FILTER_DEFAULT))));


$API = new API;
$API->Token($token);

$chamados_json = $API->listChamados();
$chamados_array = json_decode($chamados_json, true);

// Verificar se ocorreu algum erro
if (isset($chamados_array['erro']) && $chamados_array['erro'] === true) {
    echo "Ocorreu um erro: " . $chamados_array['mensagem'];
} else {
    $data = $chamados_array['data'];
    // $primeiro_chamado_id = $data[0]['idchamado'];
    // echo "ID do primeiro chamado: " . $primeiro_chamado_id;
    echo "TOKEN valido!<br>";
    header("Location: ?app=menu");

}