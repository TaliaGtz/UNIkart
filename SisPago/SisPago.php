<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UNIkart - Pago</title>
        <link rel="stylesheet" href="SisPago.css">
        <link rel="stylesheet" href="../AddModal/Cart.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
        <link rel="icon" href="../ExtraDocs/Ukart.png">
        <script src="https://www.paypal.com/sdk/js?client-id=AcUJ-uowh7ZUs48Rik1WMSGHUasoB2Lcmx-C0A5RkGWvCBuccoKy_HiCheC9DfTJT5Jh28D9I5wUOVvC&currency=MXN"></script>
    </head>
    <body>
        <?php require "../PhpDocs/Nav.php"; ?>
        
        <div class="presentacion">
            <div class="img"><img id="buyImg" src="../ExtraDocs/bolsa.png"></div>
            <div class="info">
                <div class="texto">
                    <h1>UNIkart</h1>
                    <h2>Orden de compra - <?php echo $_SESSION['Entrega']; ?></h2>
                    <br><br>
                    <div class="nota">
                        <div class="titles">
                            <p>Costo de los productos</p> 
                            <p>Propina</p>
                            <p>Tarifa de servicio</p>
                        </div>
                        <div class="costos">
                            <p id="prod">$ <?php echo $_SESSION['Total2Pay']; ?></p>
                            <!--<p>$ 0.00</p>-->
                            <input type="number" id="prop" placeholder="0.00">
                            <p>$ 10.00</p>
                        </div>
                    </div>
                    <p>Total a pagar</p>
                    <p id="total" class="total">$ <?php $total = $_SESSION['Total2Pay'] + 10; echo $total ?></p>
                    <br><br>
                    <h2>Información de pago</h2>
                    <br>
                    <div id="eleccion" class="eleccion">
                        <div class="empty"></div>
                        <label><input type="radio" name="pago" id="efectivo" value="cash">Efectivo </label> 
                        <label><input type="radio" name="pago" id="tarjeta" value="card" checked>Tarjeta </label>
                        <label><input type="radio" name="pago" id="paypal" value="payp">PayPal </label> 
                        <div class="empty"></div>
                    </div>
                    <br>
                    <div id="Efectivo" class="efectivo" style="display: none;">
    
                    </div>
                    <div id="Tarjeta" class="tarjeta" style="display: block;">
                        <p>Nombre del propietario</p>
                        <input type="text">
                        <p>Número de tarjeta</p>
                        <input type="number">
                        <div class="lab">
                        <p>Fecha de expiración</p>
                        <p id="ccv">CCV</p>
                        </div>
                        <div class="date">
                            <input type="number" class="month" placeholder="XX">
                            <p>/</p>
                            <input type="number" class="year" placeholder="XX">
                            <input id="CCV" type="number" placeholder="XXX">
                        </div>
                    </div>
                    <div id="PayPal" class="PayPal" style="display: none;">
                        <div id="paypal-button-container"></div>
                        <script>
                            // Render the PayPal button into #paypal-button-container
                            paypal.Buttons({

                                style:{
                                    color: 'gold',
                                    shape: 'pill',
                                    label: 'pay'
                                },

                                // Set up the transaction
                                createOrder: function(data, actions) {
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: '<?php echo $total; ?>'
                                            }
                                        }]
                                    });
                                },

                                onCancel: function(data){
                                    alert("Pago cancelado");
                                    concole.log(data);
                                },

                                // Finalize the transaction
                                onApprove: function(data, actions) {
                                    return actions.order.capture().then(function(orderData) {
                                        // Successful capture! For demo purposes:
                                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                        var transaction = orderData.purchase_units[0].payments.captures[0];
                                        window.location.href="../Pagado/pagado.php?Key=3";
                                    });
                                }


                            }).render('#paypal-button-container');
                        </script>
                    </div>
                    <br><br>
                </div>
                <div>
                    <a id="link" href="../Pagado/pagado.php?Key=2"><button id="pay" class="precio">Pagar</button></a>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="SisPago.js"></script>
    </body>
    </html>