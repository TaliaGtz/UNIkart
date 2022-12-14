<?php
    
    include("../PhpDocs/Conexion.php");

    //Queremos los datos del producto
    $IDWL = $_SESSION['IDLista'];
    while(mysqli_next_result($conexion)){;}
    $consultaWLProd  = mysqli_query($conexion,'CALL sp_1Var(9, "'.$IDWL.'");');

    while($fila = $consultaWLProd->fetch_array()):
        if($fila == null){
            ?> <h1 class="null">Aún no hay elementos en tu lista</h1> <?php
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
                ?><p><a id="cotiz" href="../Mensajes/mensajes.php">Cotización</a></p><?php
            }else{
                ?><p>$<?php echo $fila['PrecioCant']; ?></p><?php
            }
            ?>
            <label>Categoría/s:</label>
            <?php 
            while(mysqli_next_result($conexion)){;}
                $consultaCatProd  = mysqli_query($conexion,'CALL sp_1Var(0, "'.$IDPr.'");');
                while($fila2 = $consultaCatProd->fetch_array()):
                    ?><label> °<?php echo $fila2['Categoria'] ?></label><?php 
                endwhile;
            ?>
            <br>
            <a id="arrow" href="../Producto/Producto.php?IDBtn=<?php echo $fila['ID_Producto'];?>"><i id="view" class="fa-solid fa-circle-chevron-right"></i></a>
            <i id="xmark" class="fa-solid fa-circle-xmark quitar visQuitar2"></i>
            <br><hr>
        </div>
    </article>

<?php endwhile; ?>