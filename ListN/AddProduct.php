<?php 
    include("../PhpDocs/Conexion.php");

    $idBtn = $_GET['IDBtn'];
    $IDWL = $idBtn;
    $IDProd = $_GET['IDProd'];
    //Evaluamos el producto existe en la lista ingresada
    $consultaWL =   "SELECT ID_Producto
                    FROM productoxwl
                    WHERE ID_Producto='$IDProd'";
    $consultaWL = mysqli_query($conexion, $consultaWL);
    $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL

    if(!$consultaWL){   //Si no existe el producto en la lista
        
        //Guardamos el producto
        $sql2 = "INSERT INTO productoxwl 
                VALUES(
                    '$IDProd',
                    '$IDWL'
                )";
       
       if(mysqli_query($conexion, $sql2)){  //Ejecutamos el query y verificamos si se guardaron los datos
            header("Location: http://localhost:8080/unikart2/ListN/ListN.php?IDBtn=$IDWL&IDProd=$IDProd");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }else{

        //Buscamos si el producto existe en esa lista de ese usuario
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
                header("Location: http://localhost:8080/unikart2/ListN/ListN.php?IDBtn=$IDWL&IDProd=$IDProd");
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }
        }else{
            //echo "El producto ya existe en la lista";
            header("Location: http://localhost:8080/unikart2/ListN/ListN.php?IDBtn=$IDWL");
        }
        
    }
?>