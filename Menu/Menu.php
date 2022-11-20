<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - Menu</title>
    <link rel="stylesheet" href="Menu.css">
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

    <div class="body">
        <div class="title">
            <img src="../ExtraDocs/macs.jpg" id="titleImg">
            <p>Menú</p>
            <div class="liga">
                <label>Menú PDF: </label><a  id="liga" href="https://peacefuloak2020.wixsite.com/peaceful-oak">https://peacefuloak2020.wixsite.com/peaceful-oak</a>
                <?php if ($_SESSION['rol'] == '2') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
                    <a href="#" id="Plus" class="plus"><i class="plus fa-solid fa-circle-plus"></i></a>
                <?php } ?>
                
            </div>
        </div>
        <div id="menu" class="menu">
            <div class="card">
                <a href="../Producto/Producto.php">
                    <div>
                        <img src="../ExtraDocs/HDBlack.png" width="80px" height="80px">
                        <h3>Chilaquiles</h3>
                        <a href="../WishList/WishList.php"><i id="add" class="fa-solid fa-heart-circle-plus"></i></a>
                        <a href="#" onclick="addCart()"><i id="addCart" class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="../Producto/Producto.php">
                    <div>
                        <img src="../ExtraDocs/HDBlack.png" width="80px" height="80px">
                        <h3>Producto</h3>
                        <a href="../WishList/WishList.php"><i id="add" class="fa-solid fa-heart-circle-plus"></i></a>
                        <a href="#" onclick="addCart()"><i id="addCart" class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="../Producto/Producto.php">
                    <div>
                        <img src="../ExtraDocs/HDBlack.png" width="80px" height="80px">
                        <h3>Producto</h3>
                        <a href="../WishList/WishList.php"><i id="add" class="fa-solid fa-heart-circle-plus"></i></a>
                        <a href="#" onclick="addCart()"><i id="addCart" class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="../Producto/Producto.php">
                    <div>
                        <img src="../ExtraDocs/HDBlack.png" width="80px" height="80px">
                        <h3>Producto</h3>
                        <a href="../WishList/WishList.php"><i id="add" class="fa-solid fa-heart-circle-plus"></i></a>
                        <a href="#" onclick="addCart()"><i id="addCart" class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="../Producto/Producto.php">
                    <div>
                        <img src="../ExtraDocs/HDBlack.png" width="80px" height="80px">
                        <h3>Producto</h3>
                        <a href="../WishList/WishList.php"><i id="add" class="fa-solid fa-heart-circle-plus"></i></a>
                        <a href="#" onclick="addCart()"><i id="addCart" class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </a>
            </div>
            
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Menu.js"></script>
</body>
</html>