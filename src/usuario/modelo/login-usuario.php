<?php

// Ligação com o banco de dados 
include('../../conexao/conn.php');

//Código para consultar o banco  **o coiso 'count(ID)' conta e retorna o ID e faz o while, mas esqueci como ele coisa**
$sql = $pdo->query("SELECT *, count(ID) as found FROM usuario WHERE LOGIN = '".$_REQUEST['LOGIN']."'AND SENHA ='".md5($_REQUEST['SENHA'])."'");
//colocar crip dps


//while para tratar o resultado
while($resultado = $sql->fetch(PDO::FETCH_ASSOC)){

    if($resultado['found'] == 1){ 
        //se o usuário e senha estiverem corretos, ele cria uma sessão, se não, ele mostra um erro
        // 1 = certo
        session_start();
        $_SESSION['LOGIN'] = $resultado['LOGIN'];
        $_SESSION['TIPO'] = $resultado['TIPO_ID'];

        $dados = array(
            'tipo' => 'success',
            'mensagem' => 'Login correto'
        );
        
    }

    else {
        //2 = errado
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Login ou senha inválidos!'
        );
    }
}

echo json_encode($dados);

?>