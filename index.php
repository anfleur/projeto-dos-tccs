<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> TCETEC </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="libs/fontawesome/css/all.css">
        <link rel="stylesheet" href="libs/sweetAlert/dist/sweetalert2.css">
        <link rel="stylesheet" href="libs/DataTables/datatables.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"> TCETEC </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.html"> Log-out </a></li>
                        <li class="nav-item"><a class="nav-link" href="carrinho.php"> Carrinho</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Cadastrar</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="cadastrofuncionario.html"> Funcionários</a></li>
                                
                                <li><a class="dropdown-item" href="cadastrocliente.html"> Clientes</a></li>
                                <li><a class="dropdown-item" href="cadastroveiculo.html">Carros</a></li>
                            </ul>
                        </li>
                    </ul>
                   
                </div>
            </div>
        </nav>


        <!-- Header-->
        <header class="bg-dark py-5" style="background-color: antiquewhite;" >
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Seja Bem-Vindo(a)!</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Aluge um carro sem precisar sair de casa</p>
                </div>
            </div>
        </header>

        <section class="py-5">
                    <div class="row row-cols-1 row-cols-md-4 g-4 " >
                        <?php
                          $conn=mysqli_connect("localhost", "root", "","sistcc");     
                          $sql = "SELECT * FROM tcc";
                          $qr = mysqli_query($conn,$sql) or die(mysqli_error());
          
                        while($ln = mysqli_fetch_assoc($qr)){
                        ?>
                          <div class="col-4 mb-4">
                            <div class="card h-100">
                              <div class="card-body">
                                <h5 class="card-title"><?php echo '<h2>'.$ln['NOME_TCC'].'</h2> <br />'; ?></h5>
                               
                                
                                <p class="card-text"><?php echo 'Ano: '.$ln['ANO_TCC'].'<br />'; ?></p>
                                
                                
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        </div>
                    </div>
                
                </div>
            </div>
        </section> 
    

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
