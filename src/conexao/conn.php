<?php  

    // A conn.php cria uma conexão ao banco de dados
    $hostname = "localhost";
    $dbname = "sistema_tcc";
    $username = "root";
    $password = "";


    // Conexão a base do PDO
    try {
        $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }





    