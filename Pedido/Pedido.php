<?php

include("../PhpDocs/PhpInclude.php");

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
    <?php require "C:/xampp/htdocs/unikart2/PhpDocs/Nav.php"; ?>

    <div class="areas">
        <div class="bar">
        <h2>Pedido N</h2>
        </div>
        <div class="informe">
            <h3>Detalles del pedido</h3><br>
            <i class="fa-solid fa-location-dot"></i>Lugar de entrega<br>
            <i class="fa-solid fa-truck"></i>Nombre del repartidor <a href="../Chat/chat.php" id="chat">(Ir al chat)</a><br>
            <i class="fa-solid fa-handshake"></i>Nombre del vendedor <a href="../Chat/chat.php" id="chat">(Ir al chat)*</a><br>
            <i class="fa-solid fa-barcode"></i>(CODE)<br>
            <br><hr><br>
            <p>Fecha y hora de compra</p>
            <p>Categoría(s)</p>
            <p>Producto(s)</p>
            <p>(Calificación)</p>
            <br><hr><br>
            <h3>Costo total</h3><br>
            <p>Costo de los productos</p>
            <p>Propina</p>
            <p>Tarifa de servicio</p>
            <h4>Total pagado</h4>
            <br><hr><br>
            <h3>Transacciones</h3><br>
            <p>(Espacio de Paypal)</p>
        </div>
        <?php include("../PhpDocs/Mapas.php"); ?>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Pedido.js"></script>
</body>
</html>