<?php

    // Realiza a conexão com o banco de dados
    include('../../conexao/conn.php');

    // Cria a variável array que receberá toda a consulta do banco de dados
    $dados = array();

    // Um qyery de consulta ao banco de dados
    $sql = "SELECT * FROM CURSO ORDER BY NOME ASC";

    // Executar a querie de consulta SQL
    $resultado = $pdo->query($sql);

    // Verificação do retorno da consulta
    if($resultado){
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map('utf8_encode', $row);
        }
    }

    // Retorno JSON
    echo json_encode($dados);


    