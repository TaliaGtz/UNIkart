<?php

    include("../PhpDocs/Conexion.php");

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID         = "";
    $nombres    = $_POST["nombres"];
    $apellidos  = $_POST["apellidos"];
    $rol        = "comprador";
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

    if(!$consultaId){   //Si no existe el usuario
        

        $sql = "INSERT INTO media 
        VALUES(
            '',
            'fotoPerfil',
            '$fotoPerfil',
            ''
        )";

        $sql = "INSERT INTO registro 
        VALUES(
            '$ID        ',
            '$nombres   ',
            '$apellidos ',
            '$rol       ',
            '$fechaNac  ',
            '$correo    ',
            '$user      ',
            '$passwordHash', 
            '1'
        )";
       
        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            
            echo "alert('Tu cuenta ha sido creada')";
            header("Location: http://localhost:8080/unikart2/Landing Page/Landing.html");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{
        echo "El username ya existe";
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>