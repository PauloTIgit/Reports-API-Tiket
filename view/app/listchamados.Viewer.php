<?php

$API = new API;
$pagina = '1';
$result_chamados = $API->listChamados($pagina);

require 'view/app/menu.Viewer.php';

?>

<h1>Chamados</h1>

<?php
    print_r($result_chamados);
?>

