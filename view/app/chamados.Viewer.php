<?php require 'view/app/menu.Viewer.php'; ?>
<p>Chamados</p>


<?php
    $token = $_SESSION['token'];
    $API = new API;
    $API->Token($token);
    $pagina = 1;
    $resposta_chamados = $API->listChamados($pagina);
    $data = $resposta_chamados['data'];
    $tota_chamados = $resposta_chamados['total_itens'];
    $tota_chamados_page = 50;
    
    
?>

<style>
table, th, td {
  border: 1px solid;
}
</style>

<table>
    <thead>
        <tr>
            <th>ID </th>
            <th>Titulo</th>
            <th>Tecnico</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        ?>
        <?php for ($i=0; $i < $tota_chamados_page ; $i++): ?>
            <tr>
                <td><?php print_r($data[$i]['protocolo']); ?></td>
                <td><?php print_r($data[$i]['titulo']); ?></td>
                <td><?php print_r($data[$i]['atendente']); ?></td>
                <td><?php print_r($data[$i]['status']); ?></td>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>

