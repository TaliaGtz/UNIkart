<?php
    
    include("../PhpDocs/Conexion.php");

    $consulta = "SELECT ID_Producto, Nombre FROM productos";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        
?>

    <li><a href="../Producto/Producto.php?IDBtn=<?php echo $fila['ID_Producto']; ?>"><i class="fas fa-search"></i><?php echo $fila['Nombre']; ?></a></li>

<?php endwhile; ?>  

<?php

    $consulta = "SELECT ID_Negocio, Nombre FROM negocios";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        
?>

    <li><a href="../Menu/Menu.php?IDBtn=<?php echo $fila['ID_Negocio']; ?>"><i class="fas fa-search"></i><?php echo $fila['Nombre']; ?></a></li>

<?php endwhile; ?>  

<?php

    $consulta = "SELECT ID_Registro, Username FROM registro";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        
?>

    <li><a href="../UserPerfil/UserPerfil.php?IDP=<?php echo $fila['ID_Registro']; ?>"><i class="fas fa-search"></i><?php echo $fila['Username']; ?></a></li>

<?php endwhile; ?> 