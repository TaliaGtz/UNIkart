<?php

    include("../PhpDocs/Conexion.php");
    include("../PhpDocs/Fecha.php");

    $consulta  = mysqli_query($conexion,'CALL sp_1Var(3, "");');
    while(mysqli_next_result($conexion)){;}

    while($fila = $consulta->fetch_array()):
        
?>

    <a href="../Ventas/Ventas.php?IDEnt=<?php echo ($fila['ID_Entrega']); ?>" class="card"><div>
        <div class="text">
            <img src="../ExtraDocs/PedidosBlack.png" width="100px" height="100px">
            <h3><?php echo formatearFechaEntregas($fila['Fecha']); ?></h3>
            <i id="view" class="fa-solid fa-circle-chevron-right"></i>
        </div>
        </div>
    </a>


<?php endwhile; ?>