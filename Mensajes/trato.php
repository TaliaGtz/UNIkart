<?php

    include("../PhpDocs/PhpInclude.php");

    if(isset($_GET['IDProd'])) { 
        $trato = $_POST["trato"];
        $IDProd = $_SESSION['IDProd'];

        //echo $trato;    //UPDATE PRECIOCANT IN PRODUCTOS
        $query = "UPDATE productos
                SET PrecioCant = '$trato'
                WHERE ID_Producto = '$IDProd'";
        mysqli_query($conexion, $query);

        header("Location: http://localhost:8080/unikart2/Mensajes/mensajes.php?IDBtn=$IDProd");
    }


    if(isset($_GET['ID'])) { 
        $ID = $_GET['ID'];
        $CODE = $_GET['COD'];
        $tratoLugar = $_POST["tratoLugar"];

        $query = "UPDATE entregas
                SET Lugar = '$tratoLugar'
                WHERE CODE = '$CODE'";
        mysqli_query($conexion, $query);

        header("Location: http://localhost:8080/unikart2/Mensajes/mensajes.php?ID=$ID&COD=$CODE");
    } 

?>