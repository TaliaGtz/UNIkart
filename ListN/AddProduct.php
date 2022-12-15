<?php 
    include("../PhpDocs/Conexion.php");

    $idBtn = $_GET['IDBtn'];
    $IDWL = $idBtn;
    $IDProd = $_GET['IDProd'];
    //Evaluamos el producto existe en la lista ingresada
    $consultaWL  = mysqli_query($conexion,'CALL sp_1Var(6, "'.$IDProd.'");');
    $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}

    if(!$consultaWL){   //Si no existe el producto en la lista
        
        //Guardamos el producto
        $sql2 = "INSERT INTO productoxwl 
                VALUES(
                    '$IDProd',
                    '$IDWL'
                )";
       
        if(mysqli_query($conexion, $sql2)){  //Ejecutamos el query y verificamos si se guardaron los datos
            $url = "ListN/ListN.php?IDBtn=$IDWL&IDProd=$IDProd";
            include("../PhpDocs/header.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{

        //Buscamos si el producto existe en esa lista de ese usuario
        $consultaWL  = mysqli_query($conexion,'CALL sp_1Var(7, "'.$IDProd.'");');
        $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL
        while(mysqli_next_result($conexion)){;}
        
        if($consultaWL['ID_Wishlist'] != $IDWL){
            //Guardamos el producto
            $sql2 = "INSERT INTO productoxwl 
                    VALUES(
                        '$IDProd',
                        '$IDWL'
                    )";

            if(mysqli_query($conexion, $sql2)){  //Ejecutamos el query y verificamos si se guardaron los datos
                $url = "ListN/ListN.php?IDBtn=$IDWL&IDProd=$IDProd";
                include("../PhpDocs/header.php");
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }
        }else{
            //echo "El producto ya existe en la lista";
            $url = "ListN/ListN.php?IDBtn=$IDWL";
            include("../PhpDocs/header.php");
        }
        
    }
?>