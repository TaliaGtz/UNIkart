<?php

function str_CODE(){
    $strlength = 7;
    $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $input_lth= strlen($input);
    $randomString = '';
    for($i = 0; $i < $strlength; $i++){
        $randomChar = $input[mt_rand(0, $input_lth - 1)];
        $randomString .= $randomChar; 
    }
    return $randomString;
}

$CODIGO = str_CODE();
echo $CODIGO;

//Evaluamos el código existe
$ID_KL = $_SESSION['ID_KartList'];
$consultaWL =   "SELECT CODE
                FROM carrito
                WHERE ID_KartList='$ID_KL'";
$consultaWL = mysqli_query($conexion, $consultaWL);
$consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL

$Total = $_SESSION['Total2Pay'];

if(!$consultaWL){   //Si no existe el carrito

    //Guardamos el carrito
    $sql = "UPDATE carrito 
            SET CODE = '$CODIGO', Total = '$Total'
            WHERE ID_KartList='$ID_KL'";

    if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
        //header("Location: http://localhost:8080/unikart2/Pagado/pagado.php");
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}else{
    //Guardamos el carrito
    $sql = "UPDATE carrito 
            SET CODE = '$CODIGO', Total = '$Total'
            WHERE ID_KartList='$ID_KL'";

    if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
        //header("Location: http://localhost:8080/unikart2/Pagado/pagado.php");
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}

?>