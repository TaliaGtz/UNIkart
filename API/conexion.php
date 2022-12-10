<?php

$link = 'mysql:host=localhost;dbname=unikart_db';
$usuario = 'root';
$pass = '';

try{
    $pdo = new PDO($link, $usuario, $pass);
    //echo 'conectado';
}catch(PDOException $e){
    print "Error: " . $e->getMessage() . "<br/>";
    die();
}

?>