<?php    
    $idProd = $_SESSION['ID_Producto'];
    $count = 0;

    $consultaProdMedia  =  "SELECT P.ID_Producto, M.nombre, M.tipo, M.imagen
                        FROM productoxmedia P
                        INNER JOIN media M ON P.ID_media = M.ID_media
                        WHERE P.ID_Producto = '$idProd'";
    $ejecutar = $conexion->query($consultaProdMedia);

    //$consultaProdMedia = mysqli_query($conexion, $consultaProdMedia);
    //$consultaProdMedia = mysqli_fetch_array($consultaProdMedia);  //Devuelve un array o NULL

    while($fila = $ejecutar->fetch_array()):
        $count++;
?>

    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $count ?>" aria-label="Slide <?php echo $count + 1 ?>"></button>                 

<?php endwhile; ?> 