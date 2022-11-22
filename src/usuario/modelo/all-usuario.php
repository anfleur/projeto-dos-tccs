<?php

    // Realiza a conexão com o banco do System TCC
    include('../../conexao/conn.php');

    // Cria uma variável array que recebe toda a consulta do banco de dados
    $dados = array();

    // Query de consulta ao banco de dados
    $sql = "SELECT * FROM usuario ORDER BY LOGIN ASC";

    // Executa a query de consulta SQL
    $resultado = $pdo->query($sql);

    // Verifica o retorno da consulta
    if($resultado){
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map('utf8_encode', $row);
        }
    }

    echo json_encode($dados);




    