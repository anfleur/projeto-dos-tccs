<?php

$local_serve = "localhost";      // local do servidor
$usuario_serve = "root";         // nome do usuario
$senha_serve = "";                  // senha
$banco = "sistema_tcc";      // nome do banco de dados

$conn = mysqli_connect($local_serve,$usuario_serve,$senha_serve,$banco) or die ("Não foi possivel conectar-se ao banco de dados!");

$usuario2 = $_POST['usuario1'];
$senha2 = md5($_POST['senha1']);
$tipo = $_POST['tipo'];


if ($tipo == 1) {

	 $sqlbusca = "SELECT * FROM professores WHERE usuario = '$usuario2' AND senha = '$senha2'";
}

else if($tipo == 2) {
	$sqlbusca  = "SELECT * FROM alunos WHERE usuario = '$usuario2' AND senha = '$senha2'";
}


else{

    echo "não foi possível realizar o login";
}



//executa o comando e lança o resultado na variavel dados
$dados = mysqli_query($conn, $sqlbusca) or die("Não foi possível buscar os dados");

//verifica se retornou algum registro do banco
if (mysqli_num_rows($dados)<=0){ //se o registro é menor ou igual a zero, significa que nao tem usuario e senha cadastrado
    echo "Usuario nao cadastrado ou dados invalidos";

}

else{ //se tiver usuario e senha cadastrados efetua o login
    echo "Login efetuado com sucesso!!!!";
  
    //aplicação de session
   if (isset($usuario2)){ //Verifica se a variavel foi criada ou iniciada
       session_start(); // inicia a sessão
       $_SESSION['usuario'] = $usuario2; //atribui o usuario informado para a variavel de sessão
   }
   header("Location: ../conexao/novo.php"); //Direciona para a pagina restrita
    

}

echo " <a href='../../../login-user.html'>Voltar</a> ";

?>