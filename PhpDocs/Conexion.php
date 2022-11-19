<?php

    $servidor   = "localhost";
    $usuario    = "root";
    $pwd        = "";
    $DB         = "unikart_db";

    //Abriendo la conexión
    $conexion = mysqli_connect($servidor, $usuario, $pwd, $DB);

    if(!$conexion){
        echo "Falló la conexión <br>";
        die("Connection failed: " . mysqli_connect_error());
    }/*else{
        echo "Conexión exitosa";
    }*/

    /*function formatearFecha($fecha){
        return date('g:i a', strtotime($fecha));
    }*/
    
?>