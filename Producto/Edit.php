<?php

    include("../PhpDocs/PhpInclude.php");

    if(isset($_GET['Cant'])) {
        $idBtn = $_GET['IDBtn'];
        $Cant = $_GET['Cant'];
    }

    $consulta1  = mysqli_query($conexion,'CALL sp_Less(1, "'.$Cant.'", "'.$idBtn.'");');

    $url = "Producto/Producto.php?IDBtn=$idBtn";
    include("../PhpDocs/header.php");

?>