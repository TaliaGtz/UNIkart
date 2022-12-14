<?php
    
    include("../PhpDocs/PhpInclude.php");

    //Queremos el ID de la categoría accedida
    $IDCat = $_SESSION['IDCategory'];

    $consultaCatNeg  = mysqli_query($conexion,'CALL sp_cat(3, "'.$IDCat.'");');
    
    while($fila = $consultaCatNeg->fetch_array()):
        while(mysqli_next_result($conexion)){;}
?>

    <a href="../Menu/Menu.php?IDBtn=<?php echo $fila['ID_negocio']; ?>" class="card">
        <div>
            <div>
                <img class="text" src="../ExtraDocs/OrangeBlack.png" width="150px" height="150px">
                <h3 class="text"><?php echo $fila['Nombre']; ?></h3>
            </div>
        </div>
    </a>

<?php endwhile; ?>  

<?php

    //Queremos el ID de la categoría accedida
    $IDCat      = $_SESSION['IDCategory'];
    while(mysqli_next_result($conexion)){;}
    $consultaCatNeg  = mysqli_query($conexion,'CALL sp_cat(4, "'.$IDCat.'");');
    
    while($fila = $consultaCatNeg->fetch_array()):
        
?>

    <a href="../Producto/Producto.php?IDBtn=<?php echo $fila['ID_Producto']; ?>" class="card">
        <div>
            <div>
                <img class="text" src="../ExtraDocs/OrangeBlack.png" width="150px" height="150px">
                <h3 class="text"><?php echo $fila['Nombre']; ?></h3>
            </div>
        </div>
    </a>

<?php endwhile; ?> 