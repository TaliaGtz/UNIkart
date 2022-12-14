<?php

include("../PhpDocs/PhpInclude.php");
include("../PhpDocs/Fecha.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - Pedido</title>
    <link rel="stylesheet" href="Pedido.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <link rel="stylesheet" href="../ExtraDocs/Nav.css">
    <link rel="stylesheet" href="../ExtraDocs/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">
</head>
<body>
    <?php require "../PhpDocs/Nav.php"; ?>

    <?php 
        $IDEnt = $_GET['IDEnt'];
        $consulta  = mysqli_query($conexion,'CALL sp_2Var(8, "'.$IDEnt.'");');
        $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
        while(mysqli_next_result($conexion)){;}

        $consultaCatNeg  = mysqli_query($conexion,'CALL sp_3Var(3, "'.$IDEnt.'");');
        while(mysqli_next_result($conexion)){;}

        $consultaCatNeg2  = mysqli_query($conexion,'CALL sp_3Var(4, "'.$IDEnt.'");');
        while(mysqli_next_result($conexion)){;}
                                    
    ?>

    <div class="areas">
        <div class="bar">
        <h2>Pedido <?php echo formatearFechaEntregas($consulta['Fecha']); ?></h2>
        </div>
        <div class="informe">
            <h3>Detalles del pedido</h3><br>
            <i class="fa-solid fa-location-dot"></i>Lugar de entrega: <?php if($consulta['Lugar'] == NULL){ echo "No especificado"; }else{ echo $consulta['Lugar']; } ?><br>
            <i class="fa-solid fa-truck"></i>Nombre del repartidor <a href="../Mensajes/mensajes.php?Rol=1&COD=<?php echo $consulta['CODE'];?>&IDEnt=<?php echo$IDEnt;?>" id="chat">(Ir al chat)</a><br>
            <i class="fa-solid fa-handshake"></i>Nombre de/los vendedor/es:<br>
                <?php 
                    while($fila2 = $consultaCatNeg2->fetch_array()): 
                       ?> °<?php echo $fila2['Nombre'];
                    endwhile; 
                ?> <!--a href="../Mensajes/mensajes.php?Rol=2&COD=<?php //echo $consulta['CODE']; ?>" id="chat">(Ir al chat)</a--><br>
            <i class="fa-solid fa-barcode"></i>CODE: <?php echo $consulta['CODE']; ?><br>
            <br><hr><br>
            <p>Fecha y hora de compra: <?php echo formatearFechaEntregas($consulta['Fecha']); ?></p>
            <p>Producto(s):</p><?php 

                while($fila = $consultaCatNeg->fetch_array()): 
                   ?> °<?php echo $fila['Nombre'];
                   $ID_Producto[] = $fila['ID_Producto'];
                   
                endwhile; ?> 
            
            <p>Categoría(s):</p>
            <?php 
                foreach ($ID_Producto as $value) {

                    $consultaCatProd  = mysqli_query($conexion,'CALL sp_3Var(5, "'.$value.'");');
                    while(mysqli_next_result($conexion)){;}

                    while($fila5 = $consultaCatProd->fetch_array()):
                        ?><label> °<?php echo $fila5['Categoria'] ?></label><?php 
                    endwhile;
                    ?><label> | </label><?php
                }
            ?>
            <p>Calidad del servicio:</p>
            <div class="valoracion"> 
                <div class="stars">
                    <input type="radio" name="estrellas" id="rate5" value="5">
                    <label for="rate5" class="fas fa-star"></label>
                    <input type="radio" name="estrellas" id="rate4" value="4">
                    <label for="rate4" class="fas fa-star"></label>
                    <input type="radio" name="estrellas" id="rate3" value="3">
                    <label for="rate3" class="fas fa-star"></label>
                    <input type="radio" name="estrellas" id="rate2" value="2">
                    <label for="rate2" class="fas fa-star"></label>
                    <input type="radio" name="estrellas" id="rate1" value="1">
                    <label for="rate1" class="fas fa-star"></label>
                </div>    
                <br>
            </div>
            <br><hr><br>
            <h3>Costo total</h3><br>
            <p>Costo de los productos: $<?php echo $consulta['Total']; ?></p>
            <p>Propina</p>
            <p>Tarifa de servicio $10</p>
            <h4>Total pagado: $<?php echo $consulta['Total'] + 10; ?></h4>
            <br><hr><br>
            <h3>Transacciones</h3><br>
            <?php
                if($consulta['Pago'] == '1'){
                    ?> <p>Método de pago en efectivo</p> <?php
                }else if ($consulta['Pago'] == '2'){
                    ?> <p>Pago en tarjeta</p> <?php
                }else if ($consulta['Pago'] == '3'){
                    ?> <div class="PpBorder"><img class="Pp" src="../ExtraDocs/PayPal2.png"> 
                    </div><?php
                }else{
                    ?> <p>Transacción no identificada</p> <?php
                }
            ?>
        </div>
        <?php include("../PhpDocs/Mapas.php"); ?>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Pedido.js"></script>
</body>
</html>