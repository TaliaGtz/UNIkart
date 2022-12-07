<?php

    include("../PhpDocs/Conexion.php");
    include("../PhpDocs/Fecha.php");

    /*$userName = $_SESSION['user'];
    $_SESSION['ProdSel'] = $idBtn;

    //Queremos el ID del usuario
    $consulta1 =   "SELECT ID_Registro 
                    FROM registro
                    WHERE Username='$userName'";
    $consulta1 = mysqli_query($conexion, $consulta1);
    $consulta1 = mysqli_fetch_array($consulta1);  //Devuelve un array o NULL
    $IDUser    = $consulta1['ID_Registro'];*/

    $consulta = "SELECT ID_Entrega, Fecha 
                FROM entregas
                ";
    $ejecutar = $conexion->query($consulta);

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


<?php endwhile; ?>