<?php
    
    include("../PhpDocs/Conexion.php");

    $consulta  = mysqli_query($conexion,'CALL sp_cat(6, "");');
    while($fila = $consulta->fetch_array()):
        
?>
        
    <a href="../Category/category.php?IDBtn=<?php echo $fila['ID_Categoria']; ?>">
        <div class="card">
            <div>
                <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
            </div>
            <h3> <?php echo $fila['Categoria']; ?> </h3>
        </div>
    </a>

<?php endwhile; ?>  