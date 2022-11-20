<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Pwd</title>
</head>
<body>
    <form id="form" method="GET" action="../PhpDocs/checkPwd.php">
        <label>Introduce el nombre de usuario:</label><br><br>
        <input type="text" id="username" name="username">  
        <button id="RegButton" type="submit">Buscar</button><br><br>
    </form>
</body>
</html>

<?php

    include("../PhpDocs/Conexion.php");

    session_start();    //Inicia una nueva sesión o reanuda la existente

    $user = $_GET["username"];

    //Evaluamos si el user ingresado ya existe
    $consulta =   "SELECT * 
                    FROM registro
                    WHERE Username='$user'";
    $consulta = mysqli_query($conexion, $consulta);
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL

    echo "<br>username:<br>" . $user . "<br><br>en sql:<br>" . base64_decode($consulta['Contrasenia']) . "<br>";

    //http://localhost:8080/unikart2/PhpDocs/checkPwd.php
    
?>