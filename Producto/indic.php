<?php    
    $idProd = $_SESSION['ID_Producto'];
    $count = 0;

    $consultaProdMedia  = mysqli_query($conexion,'CALL sp_3Var(8, "'.$idProd.'");');
    while(mysqli_next_result($conexion)){;}

    while($fila = $consultaProdMedia->fetch_array()):
        $count++;
?>

    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $count ?>" aria-label="Slide <?php echo $count + 1 ?>"></button>                 

<?php endwhile; ?> 