<?php 
    include("../PhpDocs/PhpInclude.php");

    $IDWL = $_GET['IDBtn'];
    $IDProd = $_GET['IDProd'];
    $User = "$_SESSION[user]";
    if(isset($_SESSION['Entrega'])) {
        $Entrega = "$_SESSION[Entrega]";
    }else{
        $Entrega = rand(10000, 65535);
        $_SESSION['Entrega'] = $Entrega;
    }
    
    //Queremos el ID del usuario
    $consulta  = mysqli_query($conexion,'CALL sp_1Var(1, "'.$User.'");');
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}
    $User = $consulta['ID_Registro'];

    //Evaluamos el carrito existe
    $consultaWL  = mysqli_query($conexion,'CALL sp_3Var(6, "'.$IDWL.'");');
    $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}

    if(!$consultaWL){   //Si no existe el carrito
        $ID_KartList = rand(10000, 65535);
        
        //Guardamos el carrito
        $sql1 = 'CALL sp_AddVariables4(1, "'.$IDWL.'", null, "'.$ID_KartList.'", "'.$User.'", null, null, null, null, null, null, null);';

        //Guardamos el producto
        $sql4 = 'CALL sp_AddVariables4(2, null, null, null, null, null, null, "'.$ID_KartList.'", "1", "0", "'.$IDProd.'", "'.$Entrega.'");';
       
       if(mysqli_query($conexion, $sql4)){  //Ejecutamos el query y verificamos si se guardaron los datos
            mysqli_query($conexion, $sql1);
            $url = "Producto/ListN.php?IDBtn=$ID_KartList&IDProd=$IDProd";
            include("../PhpDocs/header.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{
        
        $consultaWL  = mysqli_query($conexion,'CALL sp_3Var(7, "'.$IDWL.'");');
        $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL
        while(mysqli_next_result($conexion)){;}
        $ID_KartList = $consultaWL['ID_KartList'];

        //Guardamos el producto
        $sql4 = 'CALL sp_AddVariables4(2, null, null, null, null, null, null, "'.$ID_KartList.'", "1", "0", "'.$IDProd.'", "'.$Entrega.'");';

        if(mysqli_query($conexion, $sql4)){  //Ejecutamos el query y verificamos si se guardaron los datos
            $url = "Producto/ListN.php?IDBtn=$ID_KartList&IDProd=$IDProd";
            include("../PhpDocs/header.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }

        $url = "Producto/ListN.php?IDBtn=$ID_KartList&IDProd=$IDProd";
        include("../PhpDocs/header.php");
    }
?>