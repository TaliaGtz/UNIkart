<?php

    include("../PhpDocs/Conexion.php");

    $User = "$_SESSION[user]";
    //Queremos el ID del usuario
    $consulta =   "SELECT ID_Registro 
                FROM registro
                WHERE Username = '$User'";
    $consulta = mysqli_query($conexion, $consulta);
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    $User = $consulta['ID_Registro'];

    $IDNeg = $_SESSION['IDNegocio'];
    $consulta = "SELECT ID_Producto, Nombre 
                FROM productos 
                WHERE Negocio='$IDNeg'";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
                    
?>
                  
    <div class="card">
        <a href="../Producto/Producto.php?IDBtn=<?php echo $fila['ID_Producto']; ?>">
        <div>
            <img src="../ExtraDocs/HDBlack.png" width="80px" height="80px">
            <h3><?php echo $fila['Nombre'] ?></h3>
            <a href="../WishList/WishList.php"><i id="add" class="fa-solid fa-heart-circle-plus"></i></a>
            <!--div class="dropdown">
                <i id="add" class="fa-solid fa-heart-circle-plus" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu">
                    <?php //include("../Producto/WLists.php"); ?>
                </ul>
            </!--div-->
            <a href="../Producto/AddProduct.php?IDBtn=<?php echo $User?>&IDProd=<?php echo $fila['ID_Producto'];?>"><i id="addCart" class="fa-solid fa-cart-plus"></i></a>
        </div>
        </a>
    </div>

<?php endwhile; ?> 