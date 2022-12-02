<?php
    
    include("../PhpDocs/Conexion.php");

    //Queremos los datos del producto
    /*$consulta1 =   "SELECT Nombre, Descripcion, Precio, PrecioCant
                    FROM productos
                    WHERE ID_Producto='$IDProd'";
    $consulta1 = mysqli_query($conexion, $consulta1);
    $consulta1 = mysqli_fetch_array($consulta1);  //Devuelve un array o NULL
    */
    $IDWL = $_SESSION['ID_KartList'];
    $consultaWLProd  =  "SELECT K.ID_KartList, PK.ID_Producto, P.Nombre, P.Descripcion, P.Precio, P.PrecioCant
                        FROM carrito K
                        INNER JOIN productoxkart PK ON K.ID_KartList = PK.ID_Cart
                        INNER JOIN productos P ON PK.ID_Producto = P.ID_Producto
                        WHERE K.ID_KartList = '$IDWL'";
    $ejecutar = $conexion->query($consultaWLProd);
    
    while($fila = $ejecutar->fetch_array()):
        
?>

    <article id="article+i" class="article" style="display:block;">
        <img src="../ExtraDocs/Soup.png" height="70px" width="70px" id="image" class="file">
        <div class="contDiv">
            <h2><?php echo $fila['Nombre'] ?></h2>
            <p><?php echo $fila['Descripcion'] ?></p>
            <?php
            if($fila['Precio'] == 0){
                ?><p><a id="cotiz" href="../Chat/chatpage.php">Cotización</a></p><?php
            }else{
                ?><p>$<?php echo $fila['PrecioCant']; ?></p><?php
            }
            ?>
            <p>Media(img,mp4)</p>
            <a id="arrow" href="../Producto/Producto.php?IDBtn=<?php echo $fila['ID_Producto']?>"><i id="view" class="fa-solid fa-circle-chevron-right"></i></a>
            <i id="xmark" class="fa-solid fa-circle-xmark quitar visQuitar2"></i>
            <br><hr>
        </div>
    </article>

<?php endwhile; ?>


