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

    $consulta = "SELECT Fecha 
                FROM entregas
                ";
    $ejecutar = $conexion->query($consulta);

    while($fila = $ejecutar->fetch_array()):
        
?>

    <a href="../Ventas/Ventas.php" class="card"><div>
        <div class="text">
            <img src="../ExtraDocs/PedidosBlack.png" width="100px" height="100px">
            <h3><?php echo formatearFechaEntregas($fila['Fecha']); ?></h3>
            <i id="view" class="fa-solid fa-circle-chevron-right"></i>
        </div>
        </div>
    </a>


<?php endwhile; ?>