<?php

    include("../PhpDocs/PhpInclude.php");

    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID         = "";
    $negID    = "$_SESSION[IDNegocio]";
    $product    = $_POST["prodName"];
    $rate       = "0";
    $precio     = $_POST["precio"];
    if ($precio == "1") {          
        $precioCant = $_POST["money"];     
    }else{
        $precioCant = "";
    }
    $disp       = $_POST["disp"];
    $desc       = $_POST["txtname"];
    $ID_Cat     = $_POST["checkbox"];
    $ID_Com     = "";

    //Evaluamos si el producto ingresado ya existe
    $consultaProd =   "SELECT Nombre, Negocio
                    FROM productos
                    WHERE Nombre = '$product'";
    $consultaProd = mysqli_query($conexion, $consultaProd);
    $consultaProd = mysqli_fetch_array($consultaProd);  //Devuelve un array o NULL

    if(!$consultaProd){   //Si no existe el producto
        
        $sql = "INSERT INTO productos 
        VALUES(
            '$ID        ',
            '$negID   ',
            '$product   ',
            '$rate      ',
            '$precio    ',
            '$precioCant',
            '$disp      ',
            '$desc      ',
            '$ID_Cat    ',
            '$ID_Com    '
        )";
       
        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('El producto se ha añadido')";
            header("Location: http://localhost:8080/unikart2/Producto/Producto.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }

    }else{  //El producto existente es del negocio?
        if($negID == $consultaProd['Negocio']){
            echo "El producto ya existe";
        }else{
            $sql = "INSERT INTO productos 
        VALUES(
            '$ID        ',
            '$negID   ',
            '$product   ',
            '$rate      ',
            '$precio    ',
            '$precioCant',
            '$disp      ',
            '$desc      ',
            '$ID_Cat    ',
            '$ID_Com    '
        )";
       
        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('El producto se ha añadido')";
            header("Location: http://localhost:8080/unikart2/Producto/Producto.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
        }
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>