<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema para gerenciamento de Tccs</title>
    <link rel="shortcut icon" href="img/imagem.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="libs/fontawesome/css/all.css">
    <link rel="stylesheet" href="libs/sweetAlert/dist/sweetalert2.css">
    <link rel="stylesheet" href="libs/DataTables/datatables.css">
    <link rel="stylesheet" href="css/estilo.css">
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
            </ul>
            <a class="text-white" id="logout" href="index.html"><i class="fa-solid fa-right-from-bracket"></i> Sair do Sistema </a>
        </div>
    </nav>

    
    <div id="content" class="container mt-5">

    <section id="content" class="mt-3 py-5">

        <div class="row row-cols-1 row-cols-md-4 g-4 " >

    <?php

    include('src/conexao/conn.php');

    $sql = "SELECT * FROM tcc";

    $resultado = $pdo->query($sql);

    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="col-4 mb-4">
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
        <div class="card-body">
        <h5 class="card-header text-white " style="background-color: #C21010;" ><?php echo $row['TITULO']. ", " . $row['ANO'] . '<br />'; ?></h5>
        <p class="card-text text-left mt-3 mb-4"><?php echo "Autores: " .$row['AUTOR_1'] .", " .$row['AUTOR_2'] . '<br/>'; ?></p>
        <h5 class="card-text text-left"> <?php echo $row['RESUMO'].'<br />'; ?></h5> 

        <button class="btn btn-block btn-dark btn-download">
            Baixar
        </button>
        </div>
        </div>
    </div>
    <?php } ?>
    </div>
    </div>

    </div>
</div>
</section> 
    </div>
   
    <div id="modal-download" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Title</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Content</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-download-tcc"><i class="fas fa-save"></i> Download </button>
            </div>
        </div>
    </div>
</div>


    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/menu.js"></script>
    <script src="src/tcc/controle/principal.js"></script>
    <script src="libs/fontawesome/js/all.js"></script>
    <script src="libs/DataTables/datatables.js"></script>
    <script src="libs/sweetAlert/dist/sweetalert2.all.js"></script>
   
</body>

</html>