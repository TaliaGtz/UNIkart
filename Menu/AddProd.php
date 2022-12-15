<?php

    include("../PhpDocs/PhpInclude.php");

    $IDBtn = $_SESSION['IDNegocio'];
    //Se guardan los datos de los nombres de los inputs a la tabla en la base de datos
    $ID         = rand(10000, 65535);
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
    $ID_Com     = "";

    //Evaluamos si el producto ingresado ya existe
    $consultaProd  = mysqli_query($conexion,'CALL sp_2Var(5, "'.$product.'");');
    $consultaProd = mysqli_fetch_array($consultaProd);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}

    if(!$consultaProd){   //Si no existe el producto
        
        $sql = 'CALL sp_AddVariables3(1, "'.$ID.'", "'.$negID.'", "'.$product.'", "'.$rate.'", "'.$precio.'", "'.$precioCant.'", "'.$disp.'", "'.$desc.'", "0", "0", "'.$ID_Com.'", "", "", "", "", "", "", "");';

        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            
            foreach($_POST['checkbox'] as $seleccion) {
                $sql1 = 'CALL sp_AddVariables2(3, "", "", "", "", "", "'.$seleccion.'", "'.$ID.'");';
                mysqli_query($conexion, $sql1);
            }
            echo "alert('El producto se ha añadido')";
            $url = "Menu/Menu.php?IDBtn=$IDBtn";
            include("../PhpDocs/header.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }

    }else{  //El producto existente es del negocio?
        if($negID == $consultaProd['Negocio']){
            echo "El producto ya existe";
        }else{
            $sql = 'CALL sp_AddVariables3(1, "'.$ID.'", "'.$negID.'", "'.$product.'", "'.$rate.'", "'.$precio.'", "'.$precioCant.'", "'.$disp.'", "'.$desc.'", "0", "0", "'.$ID_Com.'", null, null, null, null, null, null, null);';

            foreach($_POST['checkbox'] as $seleccion) {
                $sql1 = 'CALL sp_AddVariables2(3, null, null, null, null, null, "'.$seleccion.'", "'.$ID.'");';
                mysqli_query($conexion, $sql1);
            }

        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('El producto se ha añadido')";
            $url = "Menu/Menu.php?IDBtn=$IDBtn";
            include("../PhpDocs/header.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
        }
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>