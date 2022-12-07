<?php

include("../PhpDocs/PhpInclude.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes - e-class</title>
    <link rel="stylesheet" href="mensajes.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <link rel="stylesheet" href="../AddModal/Plus.css">
    <link rel="stylesheet" href="../ExtraDocs/Nav.css">
    <link rel="stylesheet" href="../ExtraDocs/responsive.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script type="text/javascript">
        function ajax(){
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status ==  200){
                    document.getElementById("chat").innerHTML = req.responseText;
                }
            }
            req.open('GET', '../Mensajes/chat.php', true);
            req.send();
        }

        setInterval(function(){ajax();}, 1000);    //refresca la página automáticamente
    </script>
</head>
<body onload="ajax();">

    <?php require "../PhpDocs/Nav.php"; ?>

    <?php 
        if(isset($_GET['IDProd'])) {
            $IDProd = $_GET['IDProd'];

            $consulta = "SELECT Nombre, Negocio, Valoracion, Precio, PrecioCant, Disponibilidad, Descripcion, Views  
                        FROM productos 
                        WHERE ID_Producto = '$IDProd'";
            $consulta = mysqli_query($conexion, $consulta);
            $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
            $_SESSION['Prod'] = $consulta['Nombre'];
            $Prod = $_SESSION['Prod'];
            $_SESSION['IDProd'] = $IDProd;
        }
        if(isset($_GET['ID'])) {
            $Rol = $_GET['ID'];
            $CODE = $_GET['COD'];
            /*$consulta = "SELECT Nombre, Negocio, Valoracion, Precio, PrecioCant, Disponibilidad, Descripcion, Views  
                        FROM productos 
                        WHERE ID_Producto = '$IDProd'";
            $consulta = mysqli_query($conexion, $consulta);
            $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
            $_SESSION['Prod'] = $consulta['Nombre'];
            $Prod = $_SESSION['Prod'];
            $_SESSION['IDProd'] = $IDProd;*/
        }
    ?>

    <div id="contenedor">
        <div id="caja-chat">
            <h3>Chat <?php if(isset($Prod)) { echo "- " . $Prod; }?>
            <?php if(isset($Rol)) { 
                if($Rol == '1'){
                    echo "- Repartidor"; 
                }
                if($Rol == '2'){
                    echo "- Vendedor"; 
                }
                if($Rol == '3'){
                    echo "- Cliente"; 
                }
                
                }?></h3>

            <div id="chat">
            </div>

        </div>
        <?php
            if(isset($Prod)) { ?>
                <form method="POST" action="../Mensajes/mensajes.php?IDProd=<?php echo $IDProd ?>">
                    <!-- <input type="text" name="nombre" placeholder="Ingresa tu nombre.."> -->
                    <textarea name="mensaje" placeholder="Ingresa tu mensaje.."></textarea>
                    <input type="submit" name="enviar" value="Enviar"></input>
                </form>
            <?php }
            if(isset($Rol)) { ?>
                <form method="POST" action="../Mensajes/mensajes.php?ID=<?php echo $Rol ?>&COD=<?php echo $CODE?>">
                    <!-- <input type="text" name="nombre" placeholder="Ingresa tu nombre.."> -->
                    <textarea name="mensaje" placeholder="Ingresa tu mensaje.."></textarea>
                    <input type="submit" name="enviar" value="Enviar"></input>
                </form>
            <?php }
        ?>
        <?php
            if(isset($_POST['enviar'])){
                $nombre = $_SESSION['user'];  //$_POST['nombre'];
                $mensaje = $_POST['mensaje'];
                $mensaje = base64_encode($mensaje);

                $consulta = "INSERT INTO chat (Usuario, Mensaje) 
                            VALUES('$nombre', '$mensaje')";
                $ejecutar = $conexion->query($consulta);

                if($ejecutar){
                    echo    "<audio autoplay>
                                <source src='../ExtraDocs/tono-mensaje-3-.mp3' type='audio/mpeg'>
                            </audio>";
                }
            }
        ?>
    </div>

    <?php 
    if(isset($Prod)) { ?>
        <div class="trato">
            <form method="POST" action="../Mensajes/trato.php?IDProd=<?php echo $Prod; ?>">
                <strong><label>Cerrar con: </label></strong><br>
                <label>$</label><input type="number" class="num" name="trato" step=".01"><input id="send" type="submit" value="Aceptar"></input>
            </form>
        </div>
    <?php } ?>
    
    <?php 
    if(isset($Rol)) { ?>
        <div class="tratoL">
            <form method="POST" action="../Mensajes/trato.php?ID=<?php echo $Rol; ?>&COD=<?php echo $CODE; ?>">
                <strong><label>Lugar de entrega: </label></strong><br>
                <input type="text" class="lugar" name="tratoLugar"></input><input id="send" type="submit" value="Aceptar"></input>
            </form>
        </div>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="mensajes.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>