<div class="carousel-item active">
    <form runat="server" method="POST" class="image" enctype="multipart/form-data">
        <img src="../ExtraDocs/img1.png" class="d-block w-100 productImg" alt="...">
        <div id="mi-boton" class="change"><input type="file" id="userPic" name="archivo"/><i class="fa-solid fa-plus cruz"></i></div>
        
        <button type="submit" name="guardar" id="sendImg" class="doneB done"><i class="fa-solid fa-circle-check"></i></button>
    </form>
</div>

<?php    
    $idProd = $_SESSION['ID_Producto'];

    $consultaProdMedia  =  "SELECT P.ID_Producto, M.nombre, M.tipo, M.imagen
                        FROM productoxmedia P
                        INNER JOIN media M ON P.ID_media = M.ID_media
                        WHERE P.ID_Producto = '$idProd'";
    $ejecutar = $conexion->query($consultaProdMedia);

    //$consultaProdMedia = mysqli_query($conexion, $consultaProdMedia);
    //$consultaProdMedia = mysqli_fetch_array($consultaProdMedia);  //Devuelve un array o NULL

    while($fila = $ejecutar->fetch_array()):
        
?>

    <div class="carousel-item">
        <img src="data:<?php echo $fila['tipo'] ?>;base64,<?php echo base64_encode($fila['imagen']); ?>" class="d-block w-100 productImg">
        <!--<input type="file" id="userPic" name="archivo"/>
        <button id="mi-boton" class="change"><i class="fa-solid fa-plus cruz"></i></button>
        <button type="submit" name="guardar" id="sendImg" class="doneB"><i class="fa-solid fa-circle-check"></i></button>-->
    </div>                  

<?php endwhile; ?> 