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
    //$ID_Cat     = $_POST["checkbox"];
    //Condicional para validad el genero
    /*if(isset($_POST['checkbox'])) {
		// Contando el numero de input seleccionados "checked" checkboxes.
		$checked_contador = count($_POST['checkbox']);
		//echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";

		// Bucle para almacenar y visualizar valores activados checkbox.
		foreach($_POST['checkbox'] as $seleccion) {
			//echo "<p>".$seleccion ."</p>";
            $sql1 = "INSERT INTO productoxcat
            VALUES(
                '$ID    ',
                '$seleccion'
            )";
            mysqli_query($conexion, $sql1);
		}
	}
	else{
		//echo "<p><b>Por favor seleccione al menos una opción.</b></p>";
        echo "<script>alert('Por favor seleccione al menos una opción.');</script>";
	}*/
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
            '0          ',
            '0          ',
            '$ID_Com    '
        )";
       
        foreach($_POST['checkbox'] as $seleccion) {
            //echo "<p>".$seleccion ."</p>";
            $sql1 = "INSERT INTO productoxcat
            VALUES(
                '$seleccion ',
                '$ID        '
            )";
            mysqli_query($conexion, $sql1);
        }

        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('El producto se ha añadido')";
            header("Location: http://localhost:8080/unikart2/Menu/Menu.php?IDBtn=$IDBtn");
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
            '0          ',
            '$ID_Com    '
            )";

            foreach($_POST['checkbox'] as $seleccion) {
                //echo "<p>".$seleccion ."</p>";
                $sql1 = "INSERT INTO productoxcat
                VALUES(
                    '$seleccion ',
                    '$ID        '
                )";
                mysqli_query($conexion, $sql1);
            }

        if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
            echo "alert('El producto se ha añadido')";
            header("Location: http://localhost:8080/unikart2/Menu/Menu.php?IDBtn=$IDBtn");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
        }
    }

    //Cerrando la conexión
    mysqli_close($conexion);

?>