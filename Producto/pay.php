<?php
    
    include("../PhpDocs/Conexion.php");

    $IDWL = $_SESSION['ID_KartList'];
    $consultaWLProd  = mysqli_query($conexion,'CALL sp_4Var(1, "'.$IDWL.'");');
    while(mysqli_next_result($conexion)){;}

    $total=0;
    while($fila = $consultaWLProd->fetch_array()):
        $total = $total + $fila['PrecioCant'];
    endwhile; 
    
    $_SESSION['Total2Pay'] = $total;
    echo $total;
?>