<?php

    include("../PhpDocs/Conexion.php");

    $userName = $_SESSION['user'];
    $_SESSION['ProdSel'] = $idBtn;
    //Queremos el ID del usuario
    $consulta1  = mysqli_query($conexion,'CALL sp_1Var(1, "'.$userName.'");');
    $consulta1 = mysqli_fetch_array($consulta1);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}
    $IDUser    = $consulta1['ID_Registro'];

    $consulta  = mysqli_query($conexion,'CALL sp_4Var(7, "'.$IDUser.'");');
    while(mysqli_next_result($conexion)){;}

    while($fila = $consulta->fetch_array()):
        if($fila['Privacidad'] == 1){
            $fila['Privacidad'] = "privada";
        }else{
            $fila['Privacidad'] = "pública";
        }
        
?>

    <li><a class="dropdown-item" href="../ListN/AddProduct.php?IDBtn=<?php echo $fila['ID_Wishlist'];?>&IDProd=<?php echo $idBtn;?>"><?php echo $fila['Nombre'] ?></a></li>

<?php endwhile; ?>