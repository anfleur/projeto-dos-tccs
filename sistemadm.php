<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema para gerenciamento de rifas</title>
    <link rel="shortcut icon" href="img/imagem.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="libs/fontawesome/css/all.css">
    <link rel="stylesheet" href="libs/sweetAlert/dist/sweetalert2.css">
    <link rel="stylesheet" href="libs/DataTables/datatables.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow" style="background-color: #C21010;">
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="src/curso/visao/list-curso.html"><i class="fa-solid fa-folder-open"></i> Cursos </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="src/eixo/visao/list-eixo.html"><i class="fa-solid fa-folder"></i> Eixo dos Cursos </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="src/tcc/visao/list-tcc.html"><i class="fa-solid fa-bookmark"></i> Trabalhos de Conclusão </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="src/tipo/visao/list-tipo.html"><i class="fa-solid fa-user"></i> Tipo de Acessos </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="src/usuario/visao/list-usuario.html"><i class="fa-solid fa-receipt"></i> Usuarios </a>
                </li>
            </ul>
            <a class="text-white" id="logout" href="index.html"><i class="fa-solid fa-right-from-bracket"></i> Sair do Sistema </a>
        </div>
    </nav>

    <div id="content" class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 mt-5 text-center mt-5">
                <h4 class="text-center text-dark">
                    Bem vindo ao sistema de gerenciamento de rifas
                </h4>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/menu.js"></script>
    <script src="libs/fontawesome/js/all.js"></script>
    <script src="libs/DataTables/datatables.js"></script>
    <script src="libs/sweetAlert/dist/sweetalert2.all.js"></script>
   
</body>

</html>