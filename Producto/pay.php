<?php
    
    include("../PhpDocs/Conexion.php");

    $IDWL = $_SESSION['ID_KartList'];
    $consultaWLProd  =  "SELECT K.ID_KartList, PK.ID_Producto, P.Nombre, P.Descripcion, P.Precio, P.PrecioCant
                        FROM carrito K
                        INNER JOIN productoxkart PK ON K.ID_KartList = PK.ID_Cart
                        INNER JOIN productos P ON PK.ID_Producto = P.ID_Producto
                        WHERE K.ID_KartList = '$IDWL' AND PK.status = '0'";
    $ejecutar = $conexion->query($consultaWLProd);
    $total=0;
    while($fila = $ejecutar->fetch_array()):
        $total = $total + $fila['PrecioCant'];
    endwhile; 
    
    $_SESSION['Total2Pay'] = $total;
    echo $total;
?>