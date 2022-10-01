<?php

$local_serve = "localhost";      // local do servidor
$usuario_serve = "root";         // nome do usuario
$senha_serve = "";                  // senha
$banco = "sistema_tcc";      // nome do banco de dados

$conn = mysqli_connect($local_serve,$usuario_serve,$senha_serve,$banco) or die ("Não foi possivel conectar-se ao banco de dados!");



$tipo = $_POST['TIPO'];
//$RM = $_POST['rm_ra'];
$email = $_POST['EMAIL'];
$usuario = $_POST['CADASTRO'];
$senha = md5($_POST['SENHA']);


if ($tipo == 1) {

    $sqlinsert = "INSERT INTO alunos(cadastro, email, senha) VALUES('$usuario','$email', '$senha')";
}

else if($tipo == 2) {

    $sqlinsert = "INSERT INTO professores(cadastro, email, senha) VALUES('$usuario','$email', '$senha')";
}


else{

   echo "não foi possível realizar o cadastro";
}


mysqli_query($conn, $sqlinsert) or die("Não foi possível inserir os dados"); 


echo " <a href='../../../sistema.html'>Voltar</a> ";

?>
