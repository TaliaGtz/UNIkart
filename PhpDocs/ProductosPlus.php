<?php

    include("../PhpDocs/Conexion.php");
    
    $_SESSION['Producto']="";
    $consulta  = mysqli_query($conexion,'CALL sp_6Var(5, "");');
    while(mysqli_next_result($conexion)){;}

    $j = 3;
    for($i = 0; $i < $j; $i++){
        $fila = $consulta->fetch_array();
        
        if($_SESSION['Producto'] == $fila['Nombre']){
            $j++;
            continue;
        }
?>

    <div class="card"><a href="../Producto/Producto.php?IDBtn=<?php echo $fila['ID_Producto']; ?>">
        <img src="../ExtraDocs/Soup.png" width="150px" height="150px">
        <h4 style="color: #2c1507;"><?php echo $fila['Nombre'] ?></h4>
        <?php
            if($fila['Precio'] == 0){
                ?><p><a id="cotiz" href="../Mensajes/mensajes.php?IDProd=<?php echo $fila['ID_Producto'] ?>">Cotización</a></p><?php
            }else{
                ?><p>$<?php echo $fila['PrecioCant']; ?></p><?php
            }
        ?>
        <br>
    </a></div>

<?php } ?> 