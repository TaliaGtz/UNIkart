<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - WishList</title>
    <link rel="stylesheet" href="WishList.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <link rel="stylesheet" href="../Alert/alert.css">
    <link rel="stylesheet" href="../AddModal/AddList.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">

    <script type="text/javascript">
        function ajax(){
            var req2 = new XMLHttpRequest();
            req2.onreadystatechange = function(){
                if(req2.readyState == 4 && req2.status ==  200){
                    document.getElementById("contenido").innerHTML = req2.responseText;
                }
                if(req2.readyState == 3){
                    
                }
            }
            
            req2.open('GET', '../Wishlist/Listas.php', true);
            req2.send();
        }

        setInterval(function(){ajax();}, 1000);    //refresca la página automáticamente
    </script>
</head>
<body>
    <?php require "../PhpDocs/Nav.php"; ?>

    <section class="grid">
        <div class="square">
            <h1>Lista de deseos</h1>
            <ul class="menuABC" >
                <button type="button" id="publicar" class="ABC"><li><span>Agregar</span></li></button>
                <button type="button" class="ABC"><li><span>Modificar</span></li></button>
                <button type="button" id="eliminar" class="ABC"><li><span>Eliminar</span></li></button>
            </ul>  
        </div>

        <!-- sección de listas -->

        <section id="contenido">
            
        </section>

        <!-- fin sección de listas -->

        <!-- sección de footer -->

        <div class="other">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top:0px"><path fill="#000" fill-opacity="1" d="M0,96L80,101.3C160,107,320,117,480,128C640,139,800,149,960,144C1120,139,1280,117,1360,106.7L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
        </div>
        <div class="footer"></div>
        <div class="imgFtr"><img src="../ExtraDocs/UK.png" height="70" width="70" class="logo"></div>
        <ul class="textContent">
            <li><i class="fa-solid fa-at"></i>   talia.gutierrezal@uanl.edu.mx</li>
            <li><i class="fa-solid fa-at"></i>   talia.gutierrezal@uanl.edu.mx</li>
        </ul>
        <ul class="socialMedia">
            <li><i class="fa-brands fa-instagram"></i>   Instagram</li>
            <li><i class="fa-brands fa-twitter"></i>   Twitter</li>
        </ul>

        <!-- fin sección de footer -->

    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="WishList.js"></script>
</body>
</html>