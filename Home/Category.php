<?php
    
    include("../PhpDocs/Conexion.php");

    $consulta = "SELECT Categoria FROM categorias";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        
?>

    <a href="../Category/category.php">
        <div class="card">
            <div>
                <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
            </div>
            <h3> <?php echo $fila['Categoria']; ?> </h3>
        </div>
    </a>

<?php endwhile; ?>  