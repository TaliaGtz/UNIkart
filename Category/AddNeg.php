<?php

    include("../PhpDocs/PhpInclude.php");

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID             = "";
    $negName        = $_POST["negName"];
    $DuenioUser     = "$_SESSION[user]";
    $adminApproved  = "";
    $IDCat          = "";
    $IDNeg          = rand(10000, 65535);

    //Queremos el ID del usuario
    $consulta  = mysqli_query($conexion,'CALL sp_1Var(1, "'.$DuenioUser.'");');
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}
    $DuenioUser = $consulta['ID_Registro'];

    //Queremos el ID de la categoría accedida
    $Category = $_SESSION['Category'];
    $consultaCat  = mysqli_query($conexion,'CALL sp_cat(2, "'.$Category.'");');
    $consultaCat = mysqli_fetch_array($consultaCat);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}
    $IDCat = $consultaCat['ID_Categoria'];

    //Evaluamos si el negocio ingresado ya existe
    $consultaNeg  = mysqli_query($conexion,'CALL sp_neg(1, "'.$negName.'");');
    $consultaNeg = mysqli_fetch_array($consultaNeg);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}

        //Evaluamos si el rand ingresado ya existe
        $consultaRand  = mysqli_query($conexion,'CALL sp_neg(2, "'.$IDNeg.'");');
        $consultaRand = mysqli_fetch_array($consultaRand);  //Devuelve un array o NULL
        while(mysqli_next_result($conexion)){;}

        if($consultaRand){
            $IDNeg = rand(10000, 65535);

            //Evaluamos si el rand ingresado ya existe
            $consultaRand  = mysqli_query($conexion,'CALL sp_neg(2, "'.$IDNeg.'");');
            $consultaRand = mysqli_fetch_array($consultaRand);  //Devuelve un array o NULL
            while(mysqli_next_result($conexion)){;}

            while($consultaRand){
                $IDNeg = rand(10000, 65535);
            }
        }

    if(!$consultaNeg){   //Si no existe el negocio
        
        $sql = "INSERT INTO negocios 
        VALUES(
            '$IDNeg',
            '$negName',
            '$DuenioUser',
            '$adminApproved'
        )";

        $sql2 = "INSERT INTO categoriaxnegocio 
        VALUES(
            '$IDCat',
            '$IDNeg'
        )";

        $IDBtn = $_SESSION['IDCategory'];
        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            mysqli_query($conexion, $sql2);
            echo "alert('El negocio se ha añadido')";
            $url = "Category/category.php?IDBtn=$IDBtn";
            include("../PhpDocs/header.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{      //El negocio ingresado ya existe en la tabla negocios
        $IDNeg = $consultaNeg['ID_Negocio'];
        $sql2 = "INSERT INTO categoriaxnegocio 
        VALUES(
            '$IDCat',
            '$IDNeg'
        )";
        if(mysqli_query($conexion, $sql2)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('El negocio se ha añadido')";
            $url = "Category/category.php?IDBtn=$IDBtn";
            include("../PhpDocs/header.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>