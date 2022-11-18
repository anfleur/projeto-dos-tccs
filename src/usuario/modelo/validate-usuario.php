<?php

//inclue('../../conexao/conn.php');

session_start();

if(!isset($_SESSION['LOGIN']) && !isset($_SESSION['TIPO'])){

    $dados = array(
        'tipo' => 'error',
        'mensagem' => 'Usuário ou senha incorretos, acesso negado.'
    );

}

else {

    $dados = array(
        'tipo' => 'success',
        'mensagem' => 'Seja bem-vindo '.$_SESSION['LOGIN']
    );

}

echo json_encode($dados);