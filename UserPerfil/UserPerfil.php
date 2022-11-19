<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - Perfil</title>
    <link rel="stylesheet" href="UserPerfil.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <link rel="stylesheet" href="../ExtraDocs/switch.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">
</head>
<body>
    
    <?php require "C:/xampp/htdocs/unikart2/PhpDocs/Nav.php"; ?>

    <section class="grid">
        <div class="square">
            <div class="userImg">
                <img src="User.png" height="100" width="100" id="image" alt="Imagen" class="file">
            </div>    
            <form runat="server" action="" class="image">
                <div>
                    <label class="label" for="archivo">Cambiar imagen</label>
                    <input type="file" id="userPic" name="archivo"/>  <!--disabled-->
                </div>
            </form>
             
            <ul class="userInfo">
                <br>
                <li id="username">Username</li>
                <li id="select">Rol: <input type="radio" name="role" id="comp" checked> Comprador <input type="radio" name="role" id="vend"> Vendedor <input type="radio" name="role" id="admin"> Administrador</li>
                <li class="vendedor">(Vendedor) Negocio, <a href="../Menu/Menu.php">Menú</a></li>
                <li>Cuenta: privada
                <!-- Rounded switch -->
                <label for="toggle" class="switch">
                    <input type="checkbox" id="toggle" onclick="validatePriv()">
                    <span for="toggle" class="slider round"></span>
                </label> pública</li>
                <li class="no-private">Correo</li>
                <li class="vendedor">Celular</li>
                <br>
                <a class="a" href="../Roles/Roles.php">¿Quieres una cuenta de vendedor/repartidor?</a>
            </ul>
        </div>

        <div class="contenido">
            <p class="private">Esta cuenta es privada</p><br>
            <p class="no-private">Wishlists</p><br>
            <p class="vendedor">(Vendedor) Productos autorizados por el admin (con existencias)</p><br>
            <p class="admin">(Admin) Productos autorizados por mí</p><br>
        </div>

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
    <script src="UserPerfil.js"></script>
</body>
</html>