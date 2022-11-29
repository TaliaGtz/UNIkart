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

<article id="article+i" class="article" style="display:block;">
    <img src="../ExtraDocs/Soup.png" height="70px" width="70px" id="image" class="file">
    <div class="contDiv">
        <h2>Nombre del producto</h2>
        <p>Descripción</p>
        <p>precio/a negociar</p>
        <p>Media(img,mp4)</p>
        <a id="arrow" href="../Producto/Producto.php"><i id="view" class="fa-solid fa-circle-chevron-right"></i></a>
        <i id="xmark" class="fa-solid fa-circle-xmark quitar visQuitar2"></i>
        <br><hr>
    </div>
</article>