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

        $consulta2 = "SELECT Categoria, total FROM most_categorias";

        $consulta3 = "SELECT Nombre, total FROM most_products";

        $consulta4 = "SELECT Pago, total FROM most_pays";
        $consulta4 = mysqli_query($conexion, $consulta4);
        $consulta4 = mysqli_fetch_array($consulta4);  //Devuelve un array o NULL
        
    ?>
    <div class="areas">
        <div class="bar">
        <h2>Resumen de ventas</h2>
        </div>
        <div class="informe">
            <i class="fa-solid fa-location-dot"></i>Frecuencia de lugares de entrega<br>
            <i class="fa-solid fa-truck"></i>Frecuencia de nombre del repartidor<br>
            <br><hr><br>
            <h3>Rango de fechas más usual:</h3>
            <br><hr><br>
            <div class="tablas">
                <div>
                    <h3>Categorías más vendidas:</h3>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Categoría</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ejecutar = $conexion->query($consulta2);
                        
                                while($fila = $ejecutar->fetch_array()): 
                                ?> <tr> <?php
                                ?> <td><?php echo $fila['Categoria'];?></td> <?php
                                ?> <td><?php echo $fila['total'];?></td> <?php
                                ?> </tr> <?php
                                endwhile; 
                            ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h3>Productos más vendidos:</h3>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ejecutar = $conexion->query($consulta3);
                        
                                while($fila = $ejecutar->fetch_array()): 
                                ?> <tr> <?php
                                ?> <td><?php echo $fila['Nombre'];?></td> <?php
                                ?> <td><?php echo $fila['total'];?></td> <?php
                                ?> </tr> <?php
                                endwhile; 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br><hr><br>
            <h3>Ventas totales: $<?php echo $consulta['sum(Total)']; ?></h3>
            <br><hr><br>
            <h3>Transacción más usada, con un total de <?php echo $consulta4['total']; ?> veces</h3>
            <?php if($consulta4['Pago'] == '1'){
                    ?> <p>Método de pago en efectivo</p> <?php
                }else if ($consulta4['Pago'] == '2'){
                    ?> <p>Pago en tarjeta</p> <?php
                }else if ($consulta4['Pago'] == '3'){
                    ?><div class="PpBorder"><img class="Pp" src="../ExtraDocs/PayPal2.png"></div><?php
                } 
            ?> 
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="VentasG.js"></script>
</body>
</html>