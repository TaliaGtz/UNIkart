<?php

    include("../PhpDocs/PhpInclude.php");

    if(isset($_GET['IDProd'])) { 
        $trato = $_POST["trato"];
        $IDProd = $_SESSION['IDProd'];

        echo $trato;    //UPDTE PRECIOCANT IN PRODUCTOS
        $query = 'CALL sp_upTrato(1, "'.$trato.'", "'.$IDProd.'", "", "");';

        mysqli_query($conexion, $query);

        $url = "Mensajes/mensajes.php?IDProd=$IDProd";
        include("../PhpDocs/header.php");
    }


    if(isset($_GET['Rol'])) { 
        $ID = $_GET['Rol'];
        $CODE = $_GET['COD'];
        $IDEnt = $_GET['IDEnt'];
        $tratoLugar = $_POST["tratoLugar"];

        $query = 'CALL sp_upTrato(2, "", "", "'.$tratoLugar.'", "'.$CODE.'");';

        mysqli_query($conexion, $query);

        $url = "Mensajes/mensajes.php?Rol=$ID&COD=$CODE&IDEnt=$IDEnt";
        include("../PhpDocs/header.php");
    } 

?>