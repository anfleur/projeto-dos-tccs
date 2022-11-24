<?php

    // Instância do banco de dados
    include("../../conexao/conn.php");

    // Coleta do ID que será excluído do banco de dados que está sendo enviado pelo FORM
    $ID = $_REQUEST['ID'];

    // Cria a query para interação com o banco de dados
    $sql = "DELETE FROM TIPO WHERE ID = $ID";

    // Executar a nossa querie
    $resultado = $pdo->query($sql);

    // Testa o retorno do resultado da query
    if($resultado){
        $dados = array(
            'tipo' => 'success',
            'mensagem' => 'Registro excluído com sucesso!'
        );
    } else {
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Não foi possível excluir o registro'
        );
    }

    echo json_encode($dados);



    