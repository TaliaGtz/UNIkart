<?php

    include("../PhpDocs/PhpInclude.php");

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID         = "";
    $catName    = $_POST["catName"];
    $user       = "$_SESSION[user]";
    
    //Queremos el ID del usuario
    $consulta =   "SELECT ID_Registro 
                    FROM registro
                    WHERE Username='$user'";
    $consulta = mysqli_query($conexion, $consulta);
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    $ID_User    = $consulta['ID_Registro'];

    //Evaluamos si la categoría ingresada ya existe
    $consultaCat =   "SELECT Categoria
                    FROM categorias
                    WHERE Categoria='$catName'";
    $consultaCat = mysqli_query($conexion, $consultaCat);
    $consultaCat = mysqli_fetch_array($consultaCat);  //Devuelve un array o NULL

    if(!$consultaCat){   //Si no existe la categoría
        
        $sql = "INSERT INTO categorias 
        VALUES(
            '$ID',
            '$catName',
            '$ID_User'
        )";
       
        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('La categoría se ha añadido')";
            header("Location: http://localhost:8080/unikart2/Home/Home.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{
        echo "La categoría ya existe";
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>