<?php
    
    include("../PhpDocs/Conexion.php");

    $consulta = "SELECT ID_Wishlist, Imagen, Nombre, Privacidad, Descripcion FROM wishlist";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        if($fila['Privacidad'] == 1){
            $fila['Privacidad'] = "privada";
        }else{
            $fila['Privacidad'] = "pública";
        }
        
?>

    <li><a class="dropdown-item" href="../ListN/ListN.php?IDBtn=<?php echo $fila['ID_Wishlist']; ?>"><?php echo $fila['Nombre'] ?></a></li>

<?php endwhile; ?>