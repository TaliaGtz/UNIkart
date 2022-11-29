<?php
    
    include("../PhpDocs/PhpInclude.php");

    //Queremos el ID de la categoría accedida
    $IDCat      = $_SESSION['IDCategory'];
        
    $consultaCatNeg  =  "SELECT C.ID_Categoria, CN.ID_negocio, N.Nombre
                        FROM categorias C
                        INNER JOIN categoriaxnegocio CN ON C.ID_Categoria = CN.ID_categoria
                        INNER JOIN negocios N ON CN.ID_negocio = N.ID_Negocio
                        WHERE C.ID_Categoria = '$IDCat'";
    $ejecutar = $conexion->query($consultaCatNeg);

    while($fila = $ejecutar->fetch_array()):
        
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