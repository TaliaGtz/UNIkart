<?php

    include("../PhpDocs/PhpInclude.php");

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID      = "";
    $imagen  = $_POST["nombre"];
    $wlName  = $_POST["nombre"];
    $Priv    = $_POST["Privacidad"];
    $Desc    = $_POST["comentario"];
    $Prod    = "";
    $user    = "$_SESSION[user]";
    $imagen = "../ExtraDocs/User.png";   //Foto por defecto

    //Queremos el ID del usuario
    $consulta =   "SELECT ID_Registro 
                    FROM registro
                    WHERE Username='$user'";
    $consulta = mysqli_query($conexion, $consulta);
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    $ID_User    = $consulta['ID_Registro'];

    //Evaluamos si la lista ingresada ya existe
    $consultaWL =   "SELECT Nombre
                    FROM wishlist
                    WHERE Nombre='$wlName'";
    $consultaWL = mysqli_query($conexion, $consultaWL);
    $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL

    if(!$consultaWL){   //Si no existe la lista
        
        $sql = "INSERT INTO wishlist 
        VALUES(
            '$ID',
            '$imagen',
            '$wlName',
            '$Priv',
            '$Desc',
            '$Prod',
            '$ID_User'
        )";
       
        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('La lista se ha añadido')";
            header("Location: http://localhost:8080/unikart2/Wishlist/Wishlist.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{
        echo "La lista ya existe";
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>