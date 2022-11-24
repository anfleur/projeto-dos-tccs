<div id="content" class="mt-5">

            <div class="h-100">
                <input id="searchbar" onkeyup="search_TCC()" type="text" class="form-control rounded" placeholder="Pesquisa" name="pesquisa"/>
            </div>
    <section id="content" class="py-5">
    <div class="row row-cols-1 row-cols-md-4 g-4 " >
      

<?php

    include('../src/conexao/conn.php');

    $sql = "SELECT * FROM tcc";
    $resultado = $pdo->query($sql);

    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){

?>

<div class=" TCC col-4 mb-4" >
    <div class="card shadow-sm p-3 mb-5 bg-white rounded h-100">
        <div class="card-body roun">
            <h5 class="card-header text-white " style="background-color: #C21010;" >
            <?php echo $row['TITULO']. ", " . $row['ANO'] . '<br />'; ?></h5>
            <p class="card-text text-left mt-3 mb-4"><?php echo "Autores: " .$row['AUTOR_1'] .", " .$row['AUTOR_2'] . '<br/>'; ?></p>
            <h5 class="card-text text-left"> <?php echo $row['RESUMO'].'<br />'; ?></h5> 
        </div>
            <a href="src/tcc/modelo/arquivos/<?php echo $row['ARQUIVO']; ?>" target="_BLANK" class="btn btn-lg text-white" tabindex="-1" role="button" style="background-color: #C21010;" > Baixar</a>
        </div>
    </div>

<?php } ?>

    </div>
    </section> 
</div>
    
    <script src="pesquisa/java.js"></script>