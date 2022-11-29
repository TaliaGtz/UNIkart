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

    <article id="" class="article" style="display:block;">
        <img src="../ExtraDocs/Menu.png" height="70px" width="70px" id="image" class="file">
        <div class="contDiv">
            <h2><?php echo $fila['Nombre'] ?></h2>
            <p> Lista <?php echo $fila['Privacidad'] ?></p>
            <p> Descripción: <?php echo $fila['Descripcion'] ?></p>
            <a href="../ListN/ListN.php?IDBtn=<?php echo $fila['ID_Wishlist']; ?>" id="arrow"><i id="view" class="fa-solid fa-circle-chevron-right"></i></a>
            <br><hr>
        </div>
    </article>

<?php endwhile; ?>