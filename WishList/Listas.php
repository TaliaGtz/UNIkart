<?php
    
    include("../PhpDocs/Conexion.php");

    $consulta = "SELECT ID_Wishlist, Imagen, Nombre, Privacidad, Descripcion FROM wishlist";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        
?>

    <article id="" class="article" style="display:block;">
        <img src="../ExtraDocs/Menu.png" height="70px" width="70px" id="image" class="file">
        <div class="contDiv">
            <h2><?php $fila['Nombre'] ?>dzfs</h2>
            <p><?php $fila['Privacidad'] ?>esrtse</p>
            <p><?php $fila['Descripcion'] ?>esrtsert</p>
            <a href="../ListN/ListN.php" id="arrow"><i id="view" class="fa-solid fa-circle-chevron-right"></i></a>
            <br><hr>
        </div>
    </article>

<?php endwhile; ?>