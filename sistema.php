<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System TCC</title>
    <link rel="shortcut icon" href="img/logo72.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="libs/fontawesome/css/all.css">
    <link rel="stylesheet" href="libs/sweetAlert/dist/sweetalert2.css">
    <link rel="stylesheet" href="libs/DataTables/datatables.css">
    <link rel="stylesheet" href="css/sistema.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow" style="background-color: #C21010;">
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fa-solid fa-house"></i> Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="src/tcc/visao/list-tcc.html"><i class="fa-solid fa-bookmark"></i> Trabalhos de Conclusão </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="pesquisa/pesquisa.php"><i class="fa-solid fa-search"></i> Pesquisa </a>
                </li>
            </ul>
            <a class="text-white" id="logout" href="index.php"><i class="fa-solid fa-right-from-bracket"></i> Sair do Sistema </a>
        </div>
    </nav>

    <br>
    <br>
    
    <div id="content" class="container mt-2">

    <section id="content" class="mt-3 py-5">
        <div class="row row-cols-1 row-cols-md-4 g-4 " >


    <?php

    include('src/conexao/conn.php');

    $sql = "SELECT * FROM tcc WHERE VALIDACAO = 2 ";

    $resultado = $pdo->query($sql);

    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
    ?>
    
    <div class="col col-md-4 col-sm-12 mb-4" >
      <div class="card shadow-sm p-3 mb-5 bg-white rounded h-100"> 
        <div class="card-body roun">
            <h5 class="card-header text-white " style="background-color: #C21010;" >
            
            <?php echo $row['TITULO']. ", " . $row['ANO'] . '<br />'; ?></h5>
            <p class="card-text text-left mt-3 mb-4"><?php echo "Autores: " .$row['AUTOR_1'] .", " .$row['AUTOR_2'] .", " .$row['AUTOR_3'] .", " .$row['AUTOR_4'] . "." . '<br/>'; ?></p>
        </div>
            <a href="src/tcc/modelo/arquivos/<?php echo $row['ARQUIVO']; ?>" target="_BLANK" class="btn btn-lg text-white" tabindex="-1" role="button" style="background-color: #C21010;" > Baixar</a>
        </div>
    </div>
   

    <?php } ?>
    </div>
    </div>

    </div>
</div>
</section> 
    </div>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/menu.js"></script>
    <script src="libs/fontawesome/js/all.js"></script>
    <script src="libs/DataTables/datatables.js"></script>
    <script src="libs/sweetAlert/dist/sweetalert2.all.js"></script>
    <script src="src/usuario/controle/validate-usuario.js"></script>
    <script src="src/usuario/controle/logout-usuario.js"></script>
   
</body>

</html>