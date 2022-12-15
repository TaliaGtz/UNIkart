<?php

    include("../PhpDocs/Conexion.php");

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID         = rand(10000, 65535);
    $IDMedia    = rand(10000, 65535);
    $ID_KartList= rand(10000, 65535);
    $nombres    = $_POST["nombres"];
    $apellidos  = $_POST["apellidos"];
    $rol        = "1";
    $fechaNac   = $_POST["fechaNac"];
    $correo     = $_POST["correo"];
    $user       = $_POST["username"];
    $password   = $_POST["password"];
    
    //encriptación
    $passwordHash = base64_encode($password);  //, PASSWORD_BCRYPT BCRYPT es el algoritmo de encriptación, devuelve una cadena de 60 caracteres
    $fotoPerfil = "../ExtraDocs/User.png";   //Foto por defecto

    //Evaluamos si el user ingresado ya existe
    $consultaId  = mysqli_query($conexion,'CALL sp_2Var(1, "'.$user.'");');
    $consultaId = mysqli_fetch_array($consultaId);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}

    if($IDMedia == 32767){
        $IDMedia = rand(10000, 65535);
    }
    if($ID == 32767){
        $ID = rand(10000, 65535);
    }

    if(!$consultaId){   //Si no existe el usuario
        echo $ID . " ";
        echo $IDMedia. " ";
        echo $nombres. " ";
        echo $apellidos. " ";
        echo $rol. " ";
        echo $fechaNac. " ";
        echo $correo. " ";
        echo $user. " ";
        echo $passwordHash. " ";

        $sql = 'CALL sp_Registro(1, "'.$IDMedia.'", "fotoPerfil", "'.$fotoPerfil.'", "image/png", "", "", "", "", "", "", "", "");';
        $sql2 = 'CALL sp_Registro(2, "'.$IDMedia.'", "", "", "", "'.$ID.'", "'.$nombres.'", "'.$apellidos.'", "'.$rol.'", "'.$fechaNac.'", "'.$correo.'", "'.$user.'", "'.$passwordHash.'");';

        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            //while(mysqli_next_result($conexion)){;}
            mysqli_query($conexion, $sql2);

            $url = "Landing Page/Landing.html";
            include("../PhpDocs/header.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{
        echo "El username ya existe";
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>