<?php

    include("../PhpDocs/Conexion.php");

    $consulta = "SELECT ID_Producto, Nombre FROM productos";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
                    
?>
                  
    <div class="card">
        <a href="../Producto/Producto.php?IDBtn=<?php echo $fila['ID_Producto']; ?>">
        <div>
            <img src="../ExtraDocs/HDBlack.png" width="80px" height="80px">
            <h3><?php echo $fila['Nombre'] ?></h3>
            <a href="../WishList/WishList.php"><i id="add" class="fa-solid fa-heart-circle-plus"></i></a>
            <a href="#" onclick="addCart()"><i id="addCart" class="fa-solid fa-cart-plus"></i></a>
        </div>
        </a>
    </div>

<?php endwhile; ?> 