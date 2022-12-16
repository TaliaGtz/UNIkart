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

    //Evaluamos si el rand ingresado ya existe
    $consultaRand  = mysqli_query($conexion,'CALL sp_2Var(2, "'.$IDMedia.'");');
    $consultaRand = mysqli_fetch_array($consultaRand);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}

    if($consultaRand){
        $IDMedia = rand(10000, 65535);

        //Evaluamos si el rand ingresado ya existe
        $consultaRand  = mysqli_query($conexion,'CALL sp_2Var(2, "'.$IDMedia.'");');
        $consultaRand = mysqli_fetch_array($consultaRand);  //Devuelve un array o NULL
        while(mysqli_next_result($conexion)){;}

        while($consultaRand){
            $IDMedia = rand(10000, 65535);
        }
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

        $sql = 'CALL sp_Registro(1, "'.$IDMedia.'", "fotoPerfil", "'.$fotoPerfil.'", "image/png", null, null, null, null, null, null, null, null, null);';
        $sql2 = 'CALL sp_Registro(2, null, null, null, null, "'.$ID.'", "'.$nombres.'", "'.$apellidos.'", "'.$rol.'", "'.$fechaNac.'", "'.$correo.'", "'.$user.'", "'.$passwordHash.'", "'.$IDMedia.'");';
        // $sql = "INSERT INTO media 
        // VALUES(
        //     '$IDMedia',
        //     'fotoPerfil',
        //     '$fotoPerfil',
        //     'image/png'
        // );";
        // $sql2 = "INSERT INTO registro 
        // VALUES(
        //     '$ID',
        //     '$nombres',
        //     '$apellidos',
        //     '$rol',
        //     '$fechaNac', 
        //     '$correo',
        //     '$user',
        //     '$passwordHash',
        //     '$IDMedia'
        // );";

        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            mysqli_query($conexion, $sql2);

            $url = "Landing Page/Landing.php";
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