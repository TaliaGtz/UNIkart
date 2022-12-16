<?php

    include("../PhpDocs/PhpInclude.php");

    $idBtn = $_GET['IDBtn'];
    $valoracion = $_POST['estrellas'];

    //echo $valoracion;

    $consulta1  = mysqli_query($conexion,'CALL sp_valoracion("'.$idBtn.'", "'.$valoracion.'");');

    $url = "Producto/Producto.php?IDBtn=$idBtn";
    include("../PhpDocs/header.php");

?>