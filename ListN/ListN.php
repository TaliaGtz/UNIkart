<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - ListaN</title>
    <link rel="stylesheet" href="ListN.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">
</head>
<body>
    <?php require "../PhpDocs/Nav.php"; ?>

    <?php 
        $idBtn = $_GET['IDBtn'];
        $consulta = "SELECT Nombre 
                    FROM wishlist 
                    WHERE ID_Wishlist = '$idBtn'";
        $consulta = mysqli_query($conexion, $consulta);
        $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
        $_SESSION['Lista'] = $consulta['Nombre'];
        $_SESSION['IDLista'] = $idBtn;
    ?>

    <section class="grid">
        <div class="square">
            <h1>Listas de deseos - <?php echo $_SESSION['Lista']; ?></h1>
            <ul class="menuABC" >
                <button type="button" id="publicar" class="ABC"><li><span>Agregar</span></li></button>
                <button type="button" id="listo" class="ABC"><li><span>Listo</span></li></button>
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
    <script src="ListN.js"></script>
</body>
</html>