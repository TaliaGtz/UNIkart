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
    <link rel="stylesheet" href="../ExtraDocs/Nav.css">
    <link rel="stylesheet" href="../ExtraDocs/responsive.css">
    <link rel="stylesheet" href="../AddModal/Plus.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <link rel="stylesheet" href="../ExtraDocs/switch.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--<meta http-equiv="Refresh" content="1" />-->

</head>
<body>
    
    <?php require "../PhpDocs/Nav.php"; ?>

    <section class="grid">
        <div class="square">
        <?php
            include("../PhpDocs/imgCode.php");

            if(isset($_REQUEST['guardar'])){
                if(isset($_FILES['archivo']['name'])){
                    $tipoArchivo = $_FILES['archivo']['type'];
                    $nombreArchivo = $_FILES['archivo']['name'];
                    $sizeArchivo = $_FILES['archivo']['size'];
                    $imagenSubida = fopen($_FILES['archivo']['tmp_name'], 'r');
                    $binImagen = fread($imagenSubida, $sizeArchivo);
                    $binImagen = mysqli_escape_string($conexion, $binImagen);

                    $ID_media = "$_SESSION[ID_media]";

                    $query = "UPDATE media
                            SET nombre = '$now', 
                                imagen = '$binImagen', 
                                tipo   = '$tipoArchivo'
                            WHERE ID_media = '$ID_media'";

                    if(mysqli_query($conexion, $query)){  //Ejecutamos el query y verificamos si se guardaron los datos
                        //echo "alert('Tu foto ha sido guardada')";
                        //header("Location: http://localhost:8080/e-class2/PhpFks/leerImg.php");
                    }else{
                        echo "Error: " . $query . "<br>" . mysqli_error($conexion);
                    }
                    //header('Location: http://localhost:8080/unikart2/UserPerfil/UserPerfil.php');
                }
            }
        ?>
        <div id="userImg" class="userImg">
            <?php  include("../UserPerfil/FotoUser.php");  ?>
            <!-- <img src="User.png" height="100" width="100" id="image" alt="Imagen" class="file"> -->
            <img src="data:<?php echo $query['tipo'] ?>;base64,<?php echo base64_encode($query['imagen']); ?>" id="image" class="file">
        </div>    
            
        <form runat="server" method="POST" class="image" enctype="multipart/form-data">
            <label class="label" for="archivo">Cambiar imagen</label>
            <input type="file" id="userPic" name="archivo"/>  <!--disabled-->
            <button type="submit" name="guardar" id="sendImg">Enviar</button>
        </form>
             
        <ul class="userInfo">
            <br>
            <li id="username"><?php echo "$_SESSION[user]" ?></li>
            
            <?php if ($_SESSION['rol'] == '1') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
                <label>Comprador</label>
                <li class="no-private"><?php echo "$_SESSION[correo]" ?></li>
                
                <li>Cuenta: privada
                <!-- Rounded switch -->
                <label for="toggle" class="switch">
                    <input type="checkbox" id="toggle" onclick="validatePriv()">
                    <span for="toggle" class="slider round"></span>
                </label> pública</li>
            <?php } ?>

            <?php if ($_SESSION['rol'] == '2') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
                <label>Vendedor</label>
                <li class="vendedor">(Vendedor) Negocio, <a href="../Menu/Menu.php">Menú</a></li>
                <li class="no-private"><?php echo "$_SESSION[correo]" ?></li>
            <?php } ?>

            <?php if ($_SESSION['rol'] == '4') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
                <label>Administrador</label>
                <li><?php echo "$_SESSION[correo]" ?></li>
            <?php } ?>

            <?php if ($_SESSION['rol'] != '4') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
                <br>
                <a class="a" href="../Roles/Roles.php">¿Quieres una cuenta de vendedor/repartidor?</a>
            <?php } ?>
        </ul>
        </div>
                    
        <?php if ($_SESSION['rol'] == '1') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
            <div class="contenido">
                <p class="private">Esta cuenta es privada</p><br>
                <p class="no-private">Wishlists</p><br>
            </div>
        <?php } ?>

        <?php if ($_SESSION['rol'] == '2') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
            <div class="contenido">
                <p class="no-private">Wishlists</p><br>
                <p class="vendedor">Productos autorizados por el admin (con existencias)</p><br>
            </div>
        <?php } ?>
        
        <?php if ($_SESSION['rol'] == '4') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
            <div class="contenido">
                <p class="no-private">Wishlists</p><br>
                <p class="admin">Productos autorizados por mí</p><br>
            </div>
        <?php } ?>

        
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>