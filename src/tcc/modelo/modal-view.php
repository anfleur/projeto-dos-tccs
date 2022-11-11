<?php
    include('../../conexao/conn.php');

    // Executo a recepção do id a ser buscado no banco de dados
    $ID = $_REQUEST['ID'];

    // Gero a querie de consulta no banco de dados
    $sql = "SELECT * FROM tcc WHERE ID = $ID";

    // Executar nossa querie de consulta ao banco de dados
    $resultado = $pdo->query($sql);

?>