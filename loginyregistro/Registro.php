<?php

    include("../PhpDocs/Conexion.php");

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID         = "";
    $IDMedia    = rand(10000, 65535);
    $ID_KartList= rand(10000, 65535);
    //shuffle($ID_KartList);
    $nombres    = $_POST["nombres"];
    $apellidos  = $_POST["apellidos"];
    $rol        = "1";
    $fechaNac   = $_POST["fechaNac"];
    $correo     = $_POST["correo"];
    $user       = $_POST["username"];
    $password   = $_POST["password"];
    
    //encriptación
    $passwordHash = base64_encode($password);  //, PASSWORD_BCRYPT BCRYPT es el algoritmo de encriptación, devuelve una cadena de 60 caracteres
    //$passwordHash = substr($passwordHash, 0, 60);
    $fotoPerfil = "../ExtraDocs/User.png";   //Foto por defecto

    //Evaluamos si el user ingresado ya existe
    $consultaId =   "SELECT Username
                    FROM registro
                    WHERE Username='$user'";
    $consultaId = mysqli_query($conexion, $consultaId);
    $consultaId = mysqli_fetch_array($consultaId);  //Devuelve un array o NULL

    //Evaluamos si el rand ingresado ya existe
    $consultaRand =   "SELECT ID_media
                        FROM registro
                        WHERE ID_media='$IDMedia'";
    $consultaRand = mysqli_query($conexion, $consultaRand);
    $consultaRand = mysqli_fetch_array($consultaRand);  //Devuelve un array o NULL

    if($consultaRand){
        $IDMedia = rand(10000, 65535);

        //Evaluamos si el rand ingresado ya existe
        $consultaRand =   "SELECT ID_media
                        FROM registro
                        WHERE ID_media='$IDMedia'";
        $consultaRand = mysqli_query($conexion, $consultaRand);
        $consultaRand = mysqli_fetch_array($consultaRand);  //Devuelve un array o NULL
        while($consultaRand){
            $IDMedia = rand(10000, 65535);
        }
    }

    if(!$consultaId){   //Si no existe el usuario
        

        $sql = "INSERT INTO media 
        VALUES(
            '$IDMedia',
            'fotoPerfil',
            '$fotoPerfil',
            ''
        )";

        $sql2 = "INSERT INTO registro 
        VALUES(
            '$ID        ',
            '$nombres   ',
            '$apellidos ',
            '$rol       ',
            '$fechaNac  ',
            '$correo    ',
            '$user      ',
            '$passwordHash', 
            '$IDMedia'
        )";
       
        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            mysqli_query($conexion, $sql2);
            //echo "alert('Tu cuenta ha sido creada')";
            $url = "Landing Page/Landing.html";
            include("../PhpDocs/header.php");
            //header("Location: http://localhost:8080/unikart2/Landing Page/Landing.html");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{
        echo "El username ya existe";
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>