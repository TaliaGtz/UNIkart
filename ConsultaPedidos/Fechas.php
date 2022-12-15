<?php

    include("../PhpDocs/PhpInclude.php");
    include("../PhpDocs/Fecha.php");

    if(isset($_POST['aplicar'])){
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_final = $_POST['fecha_final'];

        //echo $fecha_inicio . " y " . $fecha_final;
        $Fechas = 'CALL sp_ultSelect(2, "", "'.$fecha_inicio.'", "'.$fecha_final.'", "", "", "");';

        /*$Fechas = "SELECT ID_Entrega, Fecha 
                        FROM entregas
                        WHERE Fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'
                        ORDER BY Fecha DESC";*/

        $ejecutar = $conexion->query($Fechas);

        while($fila = $ejecutar->fetch_array()):
        
?>

    <a href="../Pedido/Pedido.php?IDEnt=<?php echo ($fila['ID_Entrega']); ?>" class="card"><div>
        <div>
            <img class="text" src="../ExtraDocs/PedidosBlack.png" width="100px" height="100px">
            <h3 class="text"><?php echo formatearFechaEntregas($fila['Fecha']); ?></h3>
            <i id="view" class="fa-solid fa-circle-chevron-right"></i>
        </div>
        </div>
    </a>


<?php endwhile; } ?>


