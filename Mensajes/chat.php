<?php

    include("../PhpDocs/PhpInclude.php");
    include("../PhpDocs/Fecha.php");

    //$nombre = $_SESSION['user'];  //$_POST['nombre'];
    //echo $nombre;

    $consulta = "SELECT IDChat, Usuario, Mensaje, Fecha FROM chat ORDER BY Fecha DESC";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        $fila['Mensaje']=base64_decode($fila['Mensaje']);
?>
    <div id="datos-chat">
        <span style="color: darkslateblue"><?php echo $fila['Usuario']; ?>: </span>
        <span><?php echo $fila['Mensaje']; ?></span>
        <span style="float: right; color: #848484; font-weight:lighter;"><?php echo formatearFecha($fila['Fecha']); ?></span>
    </div>

<?php endwhile; ?>  