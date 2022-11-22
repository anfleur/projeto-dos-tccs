<?php

// Conexão do banco de dados
include('../../conexao/conn.php');

// Resgata o ID que será excluido do banco de dados
$ID = $_REQUEST['ID'];

//Cria uma query para realizar uma interação com o banco de dados
$sql = "DELETE FROM CURSO WHERE ID = $ID";

// Executa a query $sql
$resultado = $pdo->query($sql);

// If para testar o retorno da query
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


