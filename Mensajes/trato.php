<?php

    include("../PhpDocs/PhpInclude.php");

    $trato = $_POST["trato"];
    $IDProd = $_SESSION['IDProd'];

    //echo $trato;    //UPDATE PRECIOCANT IN PRODUCTOS
    $query = "UPDATE productos
            SET PrecioCant = '$trato'
            WHERE ID_Producto = '$IDProd'";
    mysqli_query($conexion, $query);

    header("Location: http://localhost:8080/unikart2/Mensajes/mensajes.php?IDBtn=$IDProd");

?>