<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - CategoríaN</title>
    <link rel="stylesheet" href="category.css">
    <link rel="stylesheet" href="../AddModal/Plus.css">
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
        <h2>Área de (facultad)</h2>
        <?php if ($_SESSION['rol'] != '1') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
            <a href="#" id="Plus" class="plus"><i class="fa-solid fa-circle-plus"></i></a>
        <?php } ?>
        </div>
        <div id="area" class="categorias">
            <a href="../Menu/Menu.php" class="card"><div>
                <div>
                    <img class="text" src="../ExtraDocs/OrangeBlack.png" width="150px" height="150px">
                    <h3 class="text">Cafetería de físico</h3>
                </div>
                </div>
            </a>
            <a href="../Menu/Menu.php" class="card"><div>
                <div class="text">
                    <img src="../ExtraDocs/OrangeBlack.png" width="150px" height="150px">
                    <h3>Carrito de tostitos</h3>
                </div>
                </div>
            </a>
            <a href="../Menu/Menu.php" class="card"><div>
                <div class="text">
                    <img src="../ExtraDocs/OrangeBlack.png" width="150px" height="150px">
                    <h3>Hot-dogs</h3>
                </div>
                </div>
            </a>
            <a href="../Menu/Menu.php" class="card"><div>
                <div class="text">
                    <img src="../ExtraDocs/OrangeBlack.png" width="150px" height="150px">
                    <h3>Carrito de boneless</h3>
                </div>
                </div>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="category.js"></script>
</body>
</html>