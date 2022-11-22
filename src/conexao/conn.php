<?php  

// A página conn.php é responsável pela a conexão do banco com o System TCC.

    $hostname = "localhost";
    $dbname = "sistema_tcc";
    $username = "root";
    $password = "";


    try {
        $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }


