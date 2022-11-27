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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script type="text/javascript">
        function ajax(){
            var req2 = new XMLHttpRequest();
            req2.onreadystatechange = function(){
                if(req2.readyState == 4 && req2.status ==  200){
                    document.getElementById("NAV").innerHTML = req2.responseText;
                }
                if(req2.readyState == 3){
                    
                }
            }
            
            req2.open('GET', '../Menu/Category.php', true);
            req2.send();
        }

        //setInterval(function(){ajax();}, 1000);    //refresca la página automáticamente
    </script>
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
            <nav class="NAV" id="NAV">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="navTab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" autofocus>Categoría</button>
                <button class="nav-link" id="navTab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Categoría</button>
                <button class="nav-link" id="navTab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Agregar</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    
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
                    
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <h3>¿Qué necesito para ser repartidor?</h3>
                    
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <h3>¿Qué necesito para ser administrador?</h3>
                    
                </div>
            </div>    
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Menu.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>