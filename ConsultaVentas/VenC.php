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
    <script type="text/javascript">
        function ajax(){
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status ==  200){
                    document.getElementById("categorias").innerHTML = req.responseText;
                }
            }
            req.open('GET', '../ConsultaVentas/AddVenC.php', true);
            req.send();
        }

        setInterval(function(){ajax();}, 1000);    //refresca la página automáticamente
    </script>
</head>
<body onload="ajax();">
    <?php require "../PhpDocs/Nav.php"; ?>

    <div class="areas">
        <div class="bar">
            <h2>Historial de ventas</h2>
            <a href="../VentasG/VentasG.php"><button class="Res">Resumen</button></a>
        </div>
        <div id="categorias" class="categorias">
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="VenC.js"></script>
</body>
</html>