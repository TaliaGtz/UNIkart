<?php

    include("../PhpDocs/Conexion.php");

    session_start();    //Inicia una nueva sesión o reanuda la existente
    $_SESSION['login'] = false;

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $user       = $_POST["User"];
    $password   = $_POST["Pwd"];

    //Evaluamos si el user ingresado ya existe
    $consulta  = mysqli_query($conexion,'CALL sp_LogIn(1, "'.$user.'");');
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL

    $pwdHash = base64_encode($password);
    if($consulta){
        //echo "introduje:<br>" . base64_decode($pwdHash) . "<br>en sql:<br>" . base64_decode($consulta['Password']) . "<br>";
        if(base64_decode($pwdHash) === base64_decode($consulta['Contrasenia'])){   //password_verify($pwdHash, $consulta['Password'])
            $_SESSION['login']      = true;
            $_SESSION['ID_Registro']=$consulta['ID_Registro'];
            $_SESSION['nombres']    =$consulta['Nombres'];
            $_SESSION['apellidos']  =$consulta['Apellidos'];
            $_SESSION['rol']        =$consulta['Rol']; 
            $_SESSION['fechaNac']   =$consulta['FechaNac'];
            $_SESSION['correo']     =$consulta['Email'];
            $_SESSION['fotoPerfil'] =$consulta['FotoPerfil'];
            $_SESSION['user']       =$consulta['Username'];
            $_SESSION['password']   =$consulta['Contrasenia'];
            $_SESSION['ID_media']   =$consulta['ID_media'];
            
            $url = "Home/Home.php";
            include("../PhpDocs/header.php");
            //header("Location: http://localhost:8080/unikart2/Home/Home.php");
        }else{
            echo "Contraseña Incorrecta";
        }
    }else{

        echo "El usuario no existe";
        
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>