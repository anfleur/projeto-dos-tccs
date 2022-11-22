<?php

    // Conexão com o banco de dados
    include('../../conexao/conn.php');

    // Executa a recepção do id a ser buscado no banco de dados
    $ID = $_REQUEST['ID'];

    // Gera a query de consulta no banco de dados
    $sql = "SELECT * FROM CURSO WHERE ID = $ID";

    // Executar a query de consulta ao banco de dados
    $resultado = $pdo->query($sql);

    // Testa a consulta vinda do banco de dados
    if($resultado){
        $dadosEixo = array();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dadosEixo = array_map('utf8_encode', $row);
        }
        $dados = array(
            'tipo' => 'success',
            'mensagem' => '',
            'dados' => $dadosEixo
        );
    } else {
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Não foi possível obter o registro solicitado.',
            'dados' => array()
        );
    }

    echo json_encode($dados);

    

