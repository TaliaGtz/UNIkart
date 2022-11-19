<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - Ventas</title>
    <link rel="stylesheet" href="VenC.css">
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
        <h2>Historial de ventas</h2>
        <a href="../VentasG/VentasG.php">Resumen</a>
        </div>
        <div class="categorias">
            <a href="../Ventas/Ventas.php" class="card"><div>
                <div>
                    <img class="text" src="../ExtraDocs/PedidosBlack.png" width="100px" height="100px">
                    <h3 class="text">Venta 1</h3>
                    <i id="view" class="fa-solid fa-circle-chevron-right"></i>
                </div>
                </div>
            </a>
            <a href="../Ventas/Ventas.php" class="card"><div>
                <div class="text">
                    <img src="../ExtraDocs/PedidosBlack.png" width="100px" height="100px">
                    <h3>Venta 2</h3>
                    <i id="view" class="fa-solid fa-circle-chevron-right"></i>
                </div>
                </div>
            </a>
            <a href="../Ventas/Ventas.php" class="card"><div>
                <div class="text">
                    <img src="../ExtraDocs/PedidosBlack.png" width="100px" height="100px">
                    <h3>Venta 3</h3>
                    <i id="view" class="fa-solid fa-circle-chevron-right"></i>
                </div>
                </div>
            </a>
            <a href="../Ventas/Ventas.php" class="card"><div>
                <div class="text">
                    <img src="../ExtraDocs/PedidosBlack.png" width="100px" height="100px">
                    <h3>Venta 4</h3>
                    <i id="view" class="fa-solid fa-circle-chevron-right"></i>
                </div>
                </div>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="VenC.js"></script>
</body>
</html>