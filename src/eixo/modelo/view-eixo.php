<?php

    // Conexão ao banco de dados
    include('../../conexao/conn.php');

    // Executa a recepção do id que vai ser buscado no banco de dados
    $ID = $_REQUEST['ID'];

    // Gera uma query de consulta no banco de dados
    $sql = "SELECT * FROM EIXO WHERE ID = $ID";

    // Executa nossa query de consulta ao banco de dados
    $resultado = $pdo->query($sql);

    // Testa uma consulta de banco de dados
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

