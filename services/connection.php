<?php 
    $servername = "epiverso.cnmzyovsd056.us-east-1.rds.amazonaws.com";
    $username = "root";
    $password = "root12345";
    $dbname = "epiverso";

    try {
        $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        $pdo = null;
    }     
?>
