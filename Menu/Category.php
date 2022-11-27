<?php
    
    include("../PhpDocs/Conexion.php");

    $consulta = "SELECT ID_Categoria, Categoria FROM categorias";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        
?>

    <button class="nav-link" id="navTab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo $fila['Categoria']; ?></button>

<?php endwhile; ?>  