<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - Pedidos</title>
    <link rel="stylesheet" href="PedC.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <link rel="stylesheet" href="../ExtraDocs/Nav.css">
    <link rel="stylesheet" href="../ExtraDocs/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">
</head>
<body onload="ajax();">
    <?php require "../PhpDocs/Nav.php"; ?>

    <div class="areas">
        <div class="bar">
            <h2>Historial de pedidos</h2>
            <form method="post" name="formFechas" id="formFechas">
                <div>
                    <label for="fecha_inicio" class="ResN">Fecha Inicial:</label>
                    <input type="date" class="Res" name="fecha_inicio">
                </div>
                <div>
                    <label for="fecha_final" class="ResN">Fecha Final:</label>
                    <input type="date" class="Res" name="fecha_final">
                </div>
                <button type="submit" name="aplicar" class="aplicar">Aplicar</button>
                <button class="aplicar" onclick="setTimeout(function(){location.reload();}, 3000);">Reestablecer</button>
            </form>
        </div>
        <div id="categorias" class="categorias">
            <?php 

                if(isset($_POST['aplicar'])){
                    $fecha_inicio = $_POST['fecha_inicio'];
                    $fecha_final = $_POST['fecha_final'];

                    $userName = $_SESSION['user'];

                    //Queremos el ID del usuario
                    $consulta1  = mysqli_query($conexion,'CALL sp_1Var(1, "'.$userName.'");');
                    $consulta1 = mysqli_fetch_array($consulta1);  //Devuelve un array o NULL
                    while(mysqli_next_result($conexion)){;}
                    $IDUser    = $consulta1['ID_Registro'];

                    $Fechas = 'CALL sp_ultSelect(3, "", "", "", "'.$fecha_inicio.'", "'.$fecha_final.'", "'.$IDUser.'");';

                    /*$Fechas = "SELECT ID_Entrega, Fecha 
                                    FROM entregas
                                    WHERE Fecha BETWEEN '$fecha_inicio' AND '$fecha_final' AND ID_User = '$IDUser'
                                    ORDER BY Fecha DESC";*/

                    $ejecutar = $conexion->query($Fechas);

                    while($fila = $ejecutar->fetch_array()):
                    
            ?>

                <a href="../Pedido/Pedido.php?IDEnt=<?php echo ($fila['ID_Entrega']); ?>" class="card"><div>
                    <div>
                        <img class="text" src="../ExtraDocs/PedidosBlack.png" width="100px" height="100px">
                        <h3 class="text"><?php echo date('d/M/Y g:i a', strtotime($fila['Fecha'])); ?></h3>
                        <i id="view" class="fa-solid fa-circle-chevron-right"></i>
                    </div>
                    </div>
                </a>


            <?php endwhile; }else{
                include("../ConsultaPedidos/AddPedC.php");
            } 

            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="PedC.js"></script>
</body>
</html>