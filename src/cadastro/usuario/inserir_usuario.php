<?php

$local_serve = "localhost";      // local do servidor
$usuario_serve = "root";         // nome do usuario
$senha_serve = "";                  // senha
$banco = "sistema_tcc";      // nome do banco de dados

$conn = mysqli_connect($local_serve,$usuario_serve,$senha_serve,$banco) or die ("Não foi possivel conectar-se ao banco de dados!");



$tipo = $_POST['tipo'];
$RM = $_POST['rm_ra'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);


if ($tipo == 1) {

    $sqlinsert = "INSERT INTO alunos(nome, email, senha, rm_ra) VALUES('$usuario','$email', '$senha', '$RM')";
}

else if($tipo == 2) {

    $sqlinsert = "INSERT INTO professores(nome, email, senha, rm_ra) VALUES('$usuario','$email', '$senha', '$RM')";
}


else{

   echo "não foi possível realizar o cadastro";
}


mysqli_query($conn, $sqlinsert) or die("Não foi possível inserir os dados"); 


echo " <a href='../../../sistema.html'>Voltar</a> ";

?>
