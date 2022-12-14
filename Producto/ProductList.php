<?php
    
    include("../PhpDocs/Conexion.php");

    $IDWL = $_SESSION['ID_KartList'];
    $consultaWLProd  = mysqli_query($conexion,'CALL sp_4Var(1, "'.$IDWL.'");');
    while(mysqli_next_result($conexion)){;}
    
    while($fila = $consultaWLProd->fetch_array()):
        if($fila == null){
            ?> <h1 class="null">Aún no hay elementos en tu carrito</h1> <?php
        } 
        $IDPr = $fila['ID_Producto'];
?>

    <article id="article+i" class="article" style="display:block;">
        <img src="../ExtraDocs/Soup.png" height="70px" width="70px" id="image" class="file">
        <div class="contDiv">
            <h2><?php echo $fila['Nombre'] ?></h2>
            <p><?php echo $fila['Descripcion'] ?></p>
            <?php
            if($fila['Precio'] == 0){
                ?><label><a id="cotiz" href="../Mensajes/mensajes.php?IDProd=<?php echo $fila['ID_Producto']; ?>">Cotización </a></label><label>($<?php echo $fila['PrecioCant']; ?>)</label><?php
            }else{
                ?><p>$<?php echo $fila['PrecioCant']; ?></p><?php
            }
            ?>
            <label>Categoría/s:</label>
            <?php 
                $consultaCatProd  = mysqli_query($conexion,'CALL sp_4Var(2, "'.$IDPr.'");');
                while(mysqli_next_result($conexion)){;}

                while($fila2 = $consultaCatProd->fetch_array()):
                    ?><label> °<?php echo $fila2['Categoria'] ?></label><?php 
                endwhile;
            ?>
            <br>
            <a id="arrow" href="../Producto/Producto.php?IDBtn=<?php echo $fila['ID_Producto']?>"><i id="view" class="fa-solid fa-circle-chevron-right"></i></a>
            <i id="xmark" class="fa-solid fa-circle-xmark quitar visQuitar2"></i>
            <br><hr>
        </div>
    </article>

<?php endwhile; ?>


