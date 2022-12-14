<div class="carousel-item active">
    <form runat="server" method="POST" class="image" enctype="multipart/form-data">
        <img src="../ExtraDocs/img1.png" class="d-block w-100 productImg" alt="...">
        <div id="mi-boton" class="change"><input type="file" id="userPic" name="archivo"/><i class="fa-solid fa-plus cruz"></i></div>
        
        <button type="submit" name="guardar" id="sendImg" class="doneB done"><i class="fa-solid fa-circle-check"></i></button>
    </form>
</div>

<?php    
    $idProd = $_SESSION['ID_Producto'];

    $consultaProdMedia  = mysqli_query($conexion,'CALL sp_3Var(8, "'.$idProd.'");');
    while(mysqli_next_result($conexion)){;}

    while($fila = $consultaProdMedia->fetch_array()):
        
?>

    <div class="carousel-item">
        <img src="data:<?php echo $fila['tipo'] ?>;base64,<?php echo base64_encode($fila['imagen']); ?>" class="d-block w-100 productImg">
    </div>                  

<?php endwhile; ?> 