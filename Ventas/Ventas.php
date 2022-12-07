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
    <title>UNIkart - VentaN</title>
    <link rel="stylesheet" href="Ventas.css">
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
        $consulta = "SELECT Fecha, CODE, Total, Lugar
                    FROM entregas 
                    WHERE ID_Entrega = '$IDEnt'";
        $consulta = mysqli_query($conexion, $consulta);
        $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
        
        $consultaCatNeg  =  "SELECT E.ID_Entrega, PK.ID_Producto, P.Nombre, P.Negocio, P.Disponibilidad
                                    FROM entregas E
                                    INNER JOIN productoxkart PK ON E.ID_Entrega = PK.Entrega
                                    INNER JOIN productos P ON PK.ID_Producto = P.ID_Producto
                                    WHERE E.ID_Entrega = '$IDEnt'";


        $consultaCatNeg2  =  "SELECT E.ID_Entrega, PK.ID_Producto, P.Nombre, P.Negocio, N.Nombre
                                    FROM entregas E
                                    INNER JOIN productoxkart PK ON E.ID_Entrega = PK.Entrega
                                    INNER JOIN productos P ON PK.ID_Producto = P.ID_Producto
                                    INNER JOIN negocios N ON P.Negocio = N.ID_Negocio
                                    WHERE E.ID_Entrega = '$IDEnt'";

    ?>

    <div class="areas">
        <div class="bar">
        <h2>Venta N</h2>
        </div>
        <div class="informe">
            <h3>Detalles de la venta</h3><br>
            <i class="fa-solid fa-location-dot"></i>Lugar de entrega: <?php if($consulta['Lugar'] == NULL){ echo "No especificado"; }else{ echo $consulta['Lugar']; } ?><br>
            <i class="fa-solid fa-truck"></i>Nombre del repartidor <a href="../Mensajes/mensajes.php?ID=1&COD=<?php echo $consulta['CODE']; ?>" id="chat">(Ir al chat)</a><br>
            <i class="fa-solid fa-handshake"></i>Nombre del cliente <a href="../Mensajes/mensajes.php?ID=3&COD=<?php echo $consulta['CODE']; ?>" id="chat">(Ir al chat)</a><br>
            <i class="fa-solid fa-barcode"></i>CODE: <?php echo $consulta['CODE']; ?><br>
            <br><hr><br>
            <p>Fecha y hora de la venta: <?php echo formatearFechaEntregas($consulta['Fecha']); ?></p>
            <p>Categoría(s)</p>
            <p>Producto(s):<br><?php 
                $ejecutar = $conexion->query($consultaCatNeg);

                while($fila = $ejecutar->fetch_array()): 
                   ?> °<?php echo $fila['Nombre'];
                endwhile; ?> 
            </p>
            <p>(Calificación)</p>
            <p>Existencias:<br><?php 
                $ejecutar = $conexion->query($consultaCatNeg);

                while($fila = $ejecutar->fetch_array()): 
                   ?> °<?php echo $fila['Disponibilidad'];
                endwhile; ?> 
            </p>
            <br><hr><br>
            <h3>Costo total</h3><br>
            <p>Costo de los productos: $<?php echo $consulta['Total']; ?></p>
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
    <script src="Ventas.js"></script>
</body>
</html>