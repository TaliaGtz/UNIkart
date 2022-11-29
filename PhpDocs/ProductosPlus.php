<?php

    include("../PhpDocs/Conexion.php");
    
    $_SESSION['Producto']="";
    $consulta = "SELECT ID_Producto, Nombre, Precio, PrecioCant  FROM productos";
    $ejecutar = $conexion->query($consulta);
    $j = 3;
    for($i = 0; $i < $j; $i++){
        $fila = $ejecutar->fetch_array();
        
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
                ?><p><a id="cotiz" href="../Chat/chat.php">Cotización</a></p><?php
            }else{
                ?><p>$<?php echo $fila['PrecioCant']; ?></p><?php
            }
        ?>
        <br>
    </a></div>

<?php } ?> 