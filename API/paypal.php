<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AcUJ-uowh7ZUs48Rik1WMSGHUasoB2Lcmx-C0A5RkGWvCBuccoKy_HiCheC9DfTJT5Jh28D9I5wUOVvC&currency=MXN"></script>
</head>
<body>
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
                            value: '5.50'
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
                    //alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                    window.location.href="../UNIkart2/Pagado/pagado.php";
                });
            }


        }).render('#paypal-button-container');
    </script>
</body>
</html>