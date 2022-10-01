<?php

include('../../conexao/conn.php');

$id = $_POST['ID'];
$email = $_POST['EMAIL'];
$login = $_POST['LOGIN']
$senha = md5($_POST['SENHA']);
$tipo = $_POST['TIPO_ID'];


if ($tipo == 1) {

    $sqlinsert = "INSERT INTO USUARIO(ID, LOGIN, EMAIL, SENHA) VALUES('$usuario', '$login', '$email', '$senha')";
}

else if($tipo == 2) {

    $sqlinsert = "INSERT INTO USUARIO(ID, LOGIN, EMAIL, SENHA) VALUES('$usuario', '$login', '$email', '$senha')";
}


else{
   echo "Não foi possível realizar o cadastro";
}


mysqli_query($conn, $sqlinsert) or die("Não foi possível inserir os dados"); 


?>
