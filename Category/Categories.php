<?php
    
    include("../PhpDocs/Conexion.php");

    $consulta = "SELECT Nombre FROM negocios";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        
?>

    <a href="../Menu/Menu.php" class="card">
        <div>
            <div>
                <img class="text" src="../ExtraDocs/OrangeBlack.png" width="150px" height="150px">
                <h3 class="text"><?php echo $fila['Nombre']; ?></h3>
            </div>
        </div>
    </a>

<?php endwhile; ?>  