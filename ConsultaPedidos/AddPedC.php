<?php

    include("../PhpDocs/Fecha.php");

    $userName = $_SESSION['user'];

    //Queremos el ID del usuario
    $consulta1  = mysqli_query($conexion,'CALL sp_1Var(1, "'.$userName.'");');
    $consulta1 = mysqli_fetch_array($consulta1);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}
    $IDUser    = $consulta1['ID_Registro'];

    $consulta  = mysqli_query($conexion,'CALL sp_1Var(2, "'.$IDUser.'");');
    while(mysqli_next_result($conexion)){;}
    
    while($fila = $consulta->fetch_array()):
        
?>

    <a href="../Pedido/Pedido.php?IDEnt=<?php echo ($fila['ID_Entrega']); ?>" class="card"><div>
        <div>
            <img class="text" src="../ExtraDocs/PedidosBlack.png" width="100px" height="100px">
            <h3 class="text"><?php echo formatearFechaEntregas($fila['Fecha']); ?></h3>
            <i id="view" class="fa-solid fa-circle-chevron-right"></i>
        </div>
        </div>
    </a>


<?php endwhile; ?>