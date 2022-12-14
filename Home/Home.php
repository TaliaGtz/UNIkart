<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - Home</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="../AddModal/Plus.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">

    <script type="text/javascript">
        function ajax(){
            var req2 = new XMLHttpRequest();
            req2.onreadystatechange = function(){
                if(req2.readyState == 4 && req2.status ==  200){
                    document.getElementById("caty").innerHTML = req2.responseText;
                }
                if(req2.readyState == 3){
                    
                }
            }
            
            req2.open('GET', '../Home/Category.php', true);
            req2.send();
        }

        setInterval(function(){ajax();}, 1000);    //refresca la página automáticamente
    </script>
</head>
<body>
    <?php require "../PhpDocs/Nav.php"; ?>

    <div class="box">
        <input type="text" id="inputSearch" name="search" class="src" placeholder="¿Qué quieres comer hoy?" autocomplete="off">
    </div>
    <ul id="boxSearch"> <!--Filtro por comidas-->
        <?php include("../Home/Buscador.php"); ?>  
    </ul>
    <div id="coverCtnSearch"></div>
        
    <?php if ($_SESSION['rol'] != '1') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
        <a href="#" id="Plus" class="plus"><i class="fa-solid fa-circle-plus"></i></a>
    <?php } ?>

    <div>
    <!--Categorias-->
    <div class="categorias">
        <form method="POST" action="../Category/category.php">
            <div id="caty" class="categorias cat">
            
            </div>
        </form>
    </div>
 

    <!--Más vendidos/recomendados/populares-->
    <div class="prodSimi">
        <h3>Productos más vendidos</h3>
        <div class="prodSimi">
            <?php include("../PhpDocs/ProductosPlus.php"); ?>
        </div>
    </div>

    <div class="prodSimi">
        <h3>Productos recomendados</h3>
        <div class="prodSimi">
            <?php include("../PhpDocs/ProductosPlus.php"); ?>
        </div>
    </div>

    <div class="prodSimi">
        <h3>Productos populares</h3>
        <div class="prodSimi">
            <?php include("../PhpDocs/ProductosPlus.php"); ?>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Home.js"></script>
</body>
</html>