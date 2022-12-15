<?php

    include("../PhpDocs/PhpInclude.php");

    if(isset($_GET['IDProd'])) { 
        $trato = $_POST["trato"];
        $IDProd = $_SESSION['IDProd'];

        echo $trato;    //UPDATE PRECIOCANT IN PRODUCTOS
        $query = 'CALL sp_upTrato(1, "'.$trato.'", "'.$IDProd.'", "", "");';

        /*$query = "UPDATE productos
                SET PrecioCant = '$trato'
                WHERE ID_Producto = '$IDProd'";*/

        mysqli_query($conexion, $query);

        $url = "Mensajes/mensajes.php?IDProd=$IDProd";
        include("../PhpDocs/header.php");
        //header("Location: http://localhost:8080/unikart2/Mensajes/mensajes.php?IDProd=$IDProd");
    }


    if(isset($_GET['Rol'])) { 
        $ID = $_GET['Rol'];
        $CODE = $_GET['COD'];
        $IDEnt = $_GET['IDEnt'];
        $tratoLugar = $_POST["tratoLugar"];

        $query = 'CALL sp_upTrato(2, "", "", "'.$tratoLugar.'", "'.$CODE.'");';
        
        /*$query = "UPDATE entregas
                SET Lugar = '$tratoLugar'
                WHERE CODE = '$CODE'";*/

        mysqli_query($conexion, $query);

        $url = "Mensajes/mensajes.php?Rol=$ID&COD=$CODE&IDEnt=$IDEnt";
        include("../PhpDocs/header.php");
        //header("Location: http://localhost:8080/unikart2/Mensajes/mensajes.php?Rol=$ID&COD=$CODE");
    } 

?>