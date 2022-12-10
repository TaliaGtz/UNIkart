<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UNIkart - Pagado</title>
        <link rel="stylesheet" href="pagado.css">
        <link rel="stylesheet" href="../AddModal/Cart.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
        <link rel="icon" href="../ExtraDocs/Ukart.png">
    </head>
    <body>
        <?php require "../PhpDocs/Nav.php"; ?>
        
        <?php 
            if(isset($_GET['Key'])) { 
                $key = $_GET['Key']; 
                $_SESSION['key'] = $key;
            } 
        ?>

        <div class="presentacion">
            <div class="img"><img id="buyImg" src="../ExtraDocs/bolsa.png"></div>
            <div class="info">
                <div class="texto">
                    <h1>UNIkart</h1>
                    <h2>Orden de compra - <?php echo $_SESSION['Entrega']; ?></h2>
                    <br>
                    <div class="nota">
                        <h2 class="title">¡Gracias por tu confianza!</h2>
                        <br>
                        <p>Te invitamos a darle seguimiento a tu pedido desde el chat con tu repartidor.</p>
                        <br>
                        <p>Una vez entregado tu pedido, favor de proporcionar a tu repartidor el siguiente código:</p>
                        <br>
                        <h1 class="title"> <?php include("../Pagado/CODE.php"); //(CODE)?></h1>
                        <br>
                        <p class="title">(También puedes consultarlo en tu consulta del pedido)</p>
                        <br>
                    </div>
                    <br>
                </div>
                <div>
                    <a href="../Home/Home.php"><button id="pay" class="precio">Volver a Home</button></a>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="pagado.js"></script>
    </body>
    </html>