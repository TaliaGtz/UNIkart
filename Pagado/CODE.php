<?php

if(isset($_GET['Key'])) { 
    $key = $_SESSION['key'];
}

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


$Entrega = $_SESSION['Entrega'];


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

    $sql2 = "UPDATE productoxkart 
            SET status = '1'
            WHERE ID_Cart='$ID_KL'";

    $sql3 = "INSERT INTO entregas (CODE, Total, Fecha, ID_User, ID_Kart) 
            SELECT CODE, Total, FechaKart, ID_User, ID_KartList
            FROM carrito 
            WHERE ID_KartList = '$ID_KL'";
    
    $sql4 = "UPDATE entregas 
            SET ID_Entrega = '$Entrega', Pago = '$key'
            WHERE CODE='$CODIGO'";

    $Entrega = rand(10000, 65535);
    $_SESSION['Entrega'] = $Entrega;

    if(mysqli_query($conexion, $sql)){  //Ejecutamos el query y verificamos si se guardaron los datos
        mysqli_query($conexion, $sql2);
        mysqli_query($conexion, $sql3);
        mysqli_query($conexion, $sql4);
        //header("Location: http://localhost:8080/unikart2/Pagado/pagado.php");
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}

?>