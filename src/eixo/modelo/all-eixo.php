<?php

    // Realiza a conexão com o banco de dados
    include('../../conexao/conn.php');

    // Cria a variável array que receberá toda a consulta do banco de dados
    $dados = array();

    // Esse Query vai consultar o banco de dados
    $sql = "SELECT * FROM EIXO ORDER BY TITULO ASC";

    // Executa a query de consulta SQL
    $resultado = $pdo->query($sql);

    // Verifica do retorno da consulta
    if($resultado){
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map('utf8_encode', $row);
        }
    }
 
    echo json_encode($dados);


    