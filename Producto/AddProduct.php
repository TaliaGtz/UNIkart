<?php 
    include("../PhpDocs/PhpInclude.php");

    //if(isset($_GET['IDBtn'])) {
        $IDWL = $_GET['IDBtn'];
   // } 
    $IDProd = $_GET['IDProd'];
    $User = "$_SESSION[user]";
    
    //Queremos el ID del usuario
    $consulta =   "SELECT ID_Registro 
                    FROM registro
                    WHERE Username = '$User'";
    $consulta = mysqli_query($conexion, $consulta);
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    $User = $consulta['ID_Registro'];

    //Evaluamos el carrito existe
    $consultaWL =   "SELECT ID_Carrito
                    FROM carrito
                    WHERE ID_Carrito='$IDWL'";
    $consultaWL = mysqli_query($conexion, $consultaWL);
    $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL

    if(!$consultaWL){   //Si no existe el carrito
        $ID_KartList = rand(10000, 65535);
        
        //Guardamos el carrito
        $sql1 = "INSERT INTO carrito 
                VALUES(
                    '$IDWL',
                    '',
                    '$ID_KartList',
                    '$User'
                )";

        //Guardamos el producto
        $sql4 = "INSERT INTO productoxkart 
                VALUES(
                    '$ID_KartList',
                    '1',
                    '$IDProd'
                )";
       
       if(mysqli_query($conexion, $sql4)){  //Ejecutamos el query y verificamos si se guardaron los datos
            mysqli_query($conexion, $sql1);
            header("Location: http://localhost:8080/unikart2/Producto/ListN.php?IDBtn=$ID_KartList&IDProd=$IDProd");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{

        $consultaWL =   "SELECT ID_Carrito, ID_KartList
                        FROM carrito
                        WHERE ID_Carrito='$IDWL'";
        $consultaWL = mysqli_query($conexion, $consultaWL);
        $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL
        $ID_KartList = $consultaWL['ID_KartList'];

        //Guardamos el producto
        $sql4 = "INSERT INTO productoxkart 
                VALUES(
                    '$ID_KartList',
                    '1',
                    '$IDProd'
                )";

        if(mysqli_query($conexion, $sql4)){  //Ejecutamos el query y verificamos si se guardaron los datos
            header("Location: http://localhost:8080/unikart2/Producto/ListN.php?IDBtn=$ID_KartList&IDProd=$IDProd");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }

        header("Location: http://localhost:8080/unikart2/Producto/ListN.php?IDBtn=$ID_KartList&IDProd=$IDProd");
        /*//Buscamos si el producto existe en esa lista de ese usuario
        $consultaWL =   "SELECT ID_Wishlist
                        FROM productoxwl
                        WHERE ID_Producto='$IDProd'";
        $consultaWL = mysqli_query($conexion, $consultaWL);
        $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL
        if($consultaWL['ID_Wishlist'] != $IDWL){
            //Guardamos el producto
            $sql2 = "INSERT INTO productoxwl 
                    VALUES(
                        '$IDProd',
                        '$IDWL'
                    )";

            if(mysqli_query($conexion, $sql2)){  //Ejecutamos el query y verificamos si se guardaron los datos
                header("Location: http://localhost:8080/unikart2/Producto/ListN.php?IDBtn=$IDWL&IDProd=$IDProd");
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }
        }else{
            //echo "El producto ya existe en la lista";
            header("Location: http://localhost:8080/unikart2/Producto/ListN.php?IDBtn=$IDWL");
        }
        */
    }
?>