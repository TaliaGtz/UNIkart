<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - Roles</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="Roles.css">
    <link rel="stylesheet" href="../ExtraDocs/Nav.css">
    <link rel="stylesheet" href="../ExtraDocs/responsive.css">
    <link rel="stylesheet" href="../AddModal/Plus.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">
</head>
<body>
    <?php require "C:/xampp/htdocs/unikart2/PhpDocs/Nav.php"; ?>
    
    <section>
        <nav class="NAV">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="navTab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" autofocus>Vendedor</button>
              <button class="nav-link" id="navTab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Repartidor</button>
              <button class="nav-link" id="navTab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Administrador</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <h3>¿Qué necesito para ser vendedor?</h3>
                <label>Para ser vendedor debes dar de alta tu negocio en las categrías en las que quieras estar y llenar el siguiente formulario (Las podrás cambiar después):</label><br><br>
                <form action="POST" class="formulario">
                    <label><b>Datos referentes a tu negocio:</b></label><br>
                    
                    <label>¿Tendrás repartidores?</label>
                    <input type="radio" name="repart" value="si">Sí
                    <input type="radio" name="repart" value="no">No me interesa<br>

                    <label>Comisión dada a los repartidores:</label><input id="komi" type="number"><br><br>

                    <label><b>Información de contacto:</b></label><br>
                        <input type="number" placeholder="Número telefónico" style="width: 30%;"><input type="checkbox" name="same">Usar el mismo que dí de alta<br>
                        <input type="text" placeholder="Correo" style="width: 30%;"><input type="checkbox" name="same">Usar el mismo que dí de alta<br><br>

                    <label><b>Datos de tu cuenta bancaria para pagos en línea:</b></label><br>
                    <div id="Tarjeta" class="tarjeta">
                        <label>Nombre del propietario: </label><input type="text" style="width: 50%;"><br>
                        <label>Número de tarjeta: </label><input type="number" placeholder="XXXXXXXXXXXXXX" style="width: 30%;"><br>
                        <label>Fecha de expiración: </label><input type="number" class="month" placeholder="XX" style="width: 10%;"> / <input type="number" class="year" placeholder="XX" style="width: 10%;"><br>
                        <label id="ccv">CCV: </label><input id="CCV" type="number" placeholder="XXX"  style="width: 10%;"><br><br>
                    </div>

                </form>
                <label>Al ser vendedor tu perfil se hará público, todos podrán acceder a tu menú desde tu perfil y se podrán visualizar tus productos autorizados por el administrador, junto con sus existencias.</label><br>
                <a href="../UserPerfil/UserPerfil.php"><button id="aceptar" type="submit">Aceptar</button></a>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <h3>¿Qué necesito para ser repartidor?</h3>
                <label>Para ser repartidor debes llenar el siguiente formulario (Las podrás cambiar después):</label><br><br>
                <form action="" class="formulario">
                    <label><b>Información de contacto:</b></label><br>
                        <input type="number" placeholder="Número telefónico" style="width: 30%;"><input type="checkbox" name="same">Usar el mismo que dí de alta<br>
                        <input type="text" placeholder="Correo" style="width: 30%;"><input type="checkbox" name="same">Usar el mismo que dí de alta<br><br>

                    <label><b>Datos de tu cuenta bancaria para pagos en línea (Esto incluye tus comisiones y propinas):</b></label><br>
                    <div id="Tarjeta" class="tarjeta">
                        <label>Nombre del propietario: </label><input type="text" style="width: 50%;"><br>
                        <label>Número de tarjeta: </label><input type="number" placeholder="XXXXXXXXXXXXXX" style="width: 30%;"><br>
                        <label>Fecha de expiración: </label><input type="number" class="month" placeholder="XX" style="width: 10%;"> / <input type="number" class="year" placeholder="XX" style="width: 10%;"><br>
                        <label id="ccv">CCV: </label><input id="CCV" type="number" placeholder="XXX"  style="width: 10%;">
                    </div>
                </form>
                <a href="../UserPerfil/UserPerfil.php"><button id="aceptar" type="submit">Aceptar</button></a>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <h3>¿Qué necesito para ser administrador?</h3>
                <label>Para ser administrador debes llenar el siguiente formulario:</label><br><br>
                <form action="" class="formulario">
                    <label>¿Por qué quieres ser administrador?</label>
                    <input type="text" placeholder="Desarrolla tu respuesta..."  style="width: 100%;"><br>

                    <label>¿Qué edad tienes?</label>
                    <input type="text" style="width: 10%;"><br>

                    <label>¿Qué esperas obtener al volverte administrador?</label>
                    <input type="text" placeholder="Desarrolla tu respuesta..." style="width: 50%;"><br>
                    
                    <br><label><b>Información de contacto:</b></label><br>
                        <input type="number" placeholder="Número telefónico" style="width: 30%;"><input type="checkbox" name="same">Usar el mismo que dí de alta<br>
                        <input type="text" placeholder="Correo" style="width: 30%;"><input type="checkbox" name="same">Usar el mismo que dí de alta
                </form>
                <label>Al ser administrador tu perfil se hará público, tu trabajo será ayudar a dar de alta áreas, negocios, categorías, productos, entre otras cosas.</label><br>
                <label>Te contactaremos en breve para seguir con el procedimiento</label><br>
                <a href="../UserPerfil/UserPerfil.php"><button id="aceptar" type="submit">Aceptar</button></a>
            </div>
        </div>    
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Roles.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>