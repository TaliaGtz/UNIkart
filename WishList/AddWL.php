<?php

    include("../PhpDocs/PhpInclude.php");

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID      = rand(10000, 65535);
    $imagen  = $_POST["nombre"];
    $wlName  = $_POST["nombre"];
    $Priv    = $_POST["Privacidad"];
    $Desc    = $_POST["comentario"];
    $Prod    = "";
    $user    = "$_SESSION[user]";
    $imagen = "../ExtraDocs/User.png";   //Foto por defecto

    //Queremos el ID del usuario
    $consulta  = mysqli_query($conexion,'CALL sp_1Var(1, "'.$user.'");');
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}
    $ID_User    = $consulta['ID_Registro'];

    //Evaluamos si la lista ingresada ya existe
    $consultaWL  = mysqli_query($conexion,'CALL sp_5Var(8, "'.$wlName.'");');
    $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}

    if(!$consultaWL){   //Si no existe la lista
        $sql = 'CALL sp_AddVariables3(2, null, null, null, null, null, null, null, null, null, null, null, "'.$ID.'", "'.$imagen.'", "'.$wlName.'", "'.$Priv.'", "'.$Desc.'", "'.$Prod.'", "'.$ID_User.'");';
       
        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('La lista se ha añadido')";
            $url = "Wishlist/Wishlist.php";
            include("../PhpDocs/header.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{
        echo "La lista ya existe";
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>