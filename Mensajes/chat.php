<?php

    include("../PhpDocs/PhpInclude.php");
    include("../PhpDocs/Fecha.php");

    $consulta  = mysqli_query($conexion,'CALL sp_2Var(3, "");');
    while(mysqli_next_result($conexion)){;}
    while($fila = $consulta->fetch_array()):
        
        $fila['Mensaje']=base64_decode($fila['Mensaje']);
?>
    <div id="datos-chat">
        <span style="color: darkslateblue"><?php echo $fila['Usuario']; ?>: </span>
        <span><?php echo $fila['Mensaje']; ?></span>
        <span style="float: right; color: #848484; font-weight:lighter;"><?php echo formatearFecha($fila['Fecha']); ?></span>
    </div>

<?php endwhile; ?>  