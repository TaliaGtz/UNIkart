<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - VentaN</title>
    <link rel="stylesheet" href="VentasG.css">
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
        $consulta = "SELECT * 
                FROM total_entregas";
        $consulta = mysqli_query($conexion, $consulta);
        $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    ?>
    <div class="areas">
        <div class="bar">
        <h2>Venta N</h2>
        </div>
        <div class="informe">
            <h3>Resumen de ventas</h3><br>
            <i class="fa-solid fa-location-dot"></i>Frecuencia de lugares de entrega<br>
            <i class="fa-solid fa-truck"></i>Frecuencia de nombre del repartidor<br>
            <br><hr><br>
            <p>Mes y año de la venta</p>
            <p>Categoría(s)</p>
            <p>Ventas totales: $<?php echo $consulta['sum(Total)']; ?></p>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="VentasG.js"></script>
</body>
</html>