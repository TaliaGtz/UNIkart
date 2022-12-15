<?php

    include("../PhpDocs/PhpInclude.php");

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID         = rand(10000, 65535);
    $catName    = $_POST["catName"];
    $user       = "$_SESSION[user]";
    
    //Queremos el ID del usuario
    $consulta  = mysqli_query($conexion,'CALL sp_1Var(1, "'.$user.'");');
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}
    $ID_User    = $consulta['ID_Registro'];

    //Evaluamos si la categoría ingresada ya existe
    $consultaCat  = mysqli_query($conexion,'CALL sp_cat(5, "'.$catName.'");');
    $consultaCat = mysqli_fetch_array($consultaCat);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}

    if(!$consultaCat){   //Si no existe la categoría
        
        $sql = 'CALL sp_AddVariables(3, null, null, null, null, null, null, "'.$ID.'", "'.$catName.'", "'.$ID_User.'");';
       
        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('La categoría se ha añadido')";
            $url = "Home/Home.php";
            include("../PhpDocs/header.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{
        echo "La categoría ya existe";
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>