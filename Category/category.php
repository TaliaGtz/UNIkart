<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - <?php echo $_SESSION['Category']; ?></title>
    <link rel="stylesheet" href="category.css">
    <link rel="stylesheet" href="../AddModal/Plus.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <link rel="stylesheet" href="../ExtraDocs/Nav.css">
    <link rel="stylesheet" href="../ExtraDocs/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">

    <script type="text/javascript">
        function ajax(){
            var req2 = new XMLHttpRequest();
            req2.onreadystatechange = function(){
                if(req2.readyState == 4 && req2.status ==  200){
                    document.getElementById("area").innerHTML = req2.responseText;
                }
                if(req2.readyState == 3){
                    
                }
            }
            
            req2.open('GET', '../Category/Categories.php', true);
            req2.send();
        }

        setInterval(function(){ajax();}, 1000);    //refresca la página automáticamente
    </script>
</head>
<body>
    <?php require "../PhpDocs/Nav.php"; ?>
    <?php 
        $idBtn = $_GET['IDBtn'];

        $consulta  = mysqli_query($conexion,'CALL sp_cat(1, "'.$idBtn.'");');
        $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL

        //$consulta = "SELECT Categoria 
        //            FROM categorias 
        //            WHERE ID_Categoria = '$idBtn'";
        //$consulta = mysqli_query($conexion, $consulta);
        //$consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
        $_SESSION['Category'] = $consulta['Categoria'];
        $_SESSION['IDCategory'] = $idBtn;
    ?>

    <div class="areas">
        <div class="bar">
        <h2> <?php echo $_SESSION['Category']; ?> </h2>
        <?php if ($_SESSION['rol'] != '1') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
            <a href="#" id="Plus" class="plus"><i class="fa-solid fa-circle-plus"></i></a>
        <?php } ?>
        </div>
        <div id="area" class="categorias">

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="category.js"></script>
</body>
</html>