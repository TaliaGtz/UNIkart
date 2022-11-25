<?php

    include("../PhpDocs/PhpInclude.php");

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID             = "";
    $negName        = $_POST["negName"];
    $DuenioUser     = "$_SESSION[user]";
    $adminApproved  = "";

    //Queremos el ID del usuario
    $consulta =   "SELECT ID_Registro 
                    FROM registro
                    WHERE Username = '$DuenioUser'";
    $consulta = mysqli_query($conexion, $consulta);
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    $DuenioUser = $consulta['ID_Registro'];

    //Evaluamos si el negocio ingresado ya existe
    $consultaNeg =   "SELECT Nombre
                    FROM negocios
                    WHERE Nombre = '$negName'";
    $consultaNeg = mysqli_query($conexion, $consultaNeg);
    $consultaNeg = mysqli_fetch_array($consultaNeg);  //Devuelve un array o NULL

    if(!$consultaNeg){   //Si no existe el negocio
        
        $sql = "INSERT INTO negocios 
        VALUES(
            '$ID',
            '$negName',
            '$DuenioUser',
            '$adminApproved'
        )";
        $IDBtn = $_SESSION['IDCategory'];
        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('La categoría se ha añadido')";
            header("Location: http://localhost:8080/unikart2/Category/category.php?IDBtn=$IDBtn");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{
        echo "La categoría ya existe";
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>