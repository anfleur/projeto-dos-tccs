<?php

    // Instância do banco de dados
    include("../../conexao/conn.php");

    // Coleta p ID que será excluído do banco de dados que está sendo enviado pelo FORM
    $ID = $_REQUEST['ID'];

    // Cria a  query para interação com o banco de dados
    $sql = "DELETE FROM EIXO WHERE ID = $ID";

    // Executa a query criada
    $resultado = $pdo->query($sql);

    // Testa o retorno do resultado
    if($resultado){
        // Se for bem sucedido esse SweetAlert aparecerá
        $dados = array(
            'tipo' => 'success',
            'mensagem' => 'Registro excluído com sucesso!'
        );
    } else {
        // Caso ao contrário, esse SweetAlert aparecerá
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Não foi possível excluir o registro'
        );
    }

    echo json_encode($dados);