<?php
 include('../src/conexao/conn.php');
?>

<?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
?>

<form action="" method="POST">
    <input type="text" name="texto_pesquisar" placeholder="Pesquisar pelo TCC">
    <input type="submit" value="Pesquisar" name="PesqUsuario">
</form>


<?php
if (!empty($dados["PesqUsuario"])){
    $TITULO = "%".$dados['texto_pesquisar']."%";
    $query_tccs = "SELECT ID, TITULO FROM tcc WHERE TITULO LIKE :TITULO ORDER BY ID DESC";
    $result_tccs = $conn->prepare($query_tccs);
    $result_tccs->bindParam(':TITULO', $TITULO);
    $result_tccs->execute();

    if(($result_tccs) and ($result_tccs->rowCount()!= 0)){
        while($result_tccs->fetch(PDO::FETCH_ASSOC)){
            extract($row_tcc);
            echo "ID: $ID <br>";
            echo "TITULO: $TITULO";
        }
    }else{
        echo "<p class='text-danger' > Nenhum resultado achado </p>";
    }
}


?>
