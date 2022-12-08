<?php 
     include('src/conexao/conn.php');
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System TCC</title>
    <link rel="shortcut icon" href="img/logoSystemTCC.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="libs/fontawesome/css/all.css">
    <link rel="stylesheet" href="libs/sweetAlert/dist/sweetalert2.css">
    <link rel="stylesheet" href="libs/DataTables/datatables.css">
    <link rel="stylesheet" href="css/sistema.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow navbar-dark">
        <button class="navbar-toggler bg-danger" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-house"></i> Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="src/tcc/visao/list-tcc.html"><i class="fa-solid fa-bookmark"></i> Trabalhos de Conclusão </a>
                </li>
            </ul>
            <a class="text-dark" id="logout" href="index.php"><i class="fa-solid fa-right-from-bracket"></i> Sair do Sistema </a>
        </div>
    </nav>

    <br>
    <br>
    
    <div id="content" class="container mt-2">
        <div class="row mt-5" >

        <?php

            $sql = "SELECT * FROM tcc WHERE VALIDACAO = 2 ";

            $resultado = $pdo->query($sql);

            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
        ?>
    
    <div class="col col-md-4 col-sm-12 mb-4 mt-5" >
        <div class="card-group">
            <div class="card">
                <div class="card-header bg-white">
                    <i class=" mt-2 mb-2 fa-solid fa-file"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['TITULO']. ", " . $row['ANO']; ?></h5>
                    <p class="card-text demo"><?php echo $row['RESUMO']; ?></p>
                    <a href="src/tcc/modelo/arquivos/<?php echo $row['ARQUIVO']; ?>" target="_BLANK"  class="btn btn-dark">Baixar</a>
                </div>
            </div>
        </div>
    </div>
            <?php 
                } 
            ?>
    </div> 
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