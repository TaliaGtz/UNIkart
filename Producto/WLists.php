<?php

    include("../PhpDocs/Conexion.php");

    $userName = $_SESSION['user'];
    $_SESSION['ProdSel'] = $idBtn;
    //Queremos el ID del usuario
    $consulta1 =   "SELECT ID_Registro 
                    FROM registro
                    WHERE Username='$userName'";
    $consulta1 = mysqli_query($conexion, $consulta1);
    $consulta1 = mysqli_fetch_array($consulta1);  //Devuelve un array o NULL
    $IDUser    = $consulta1['ID_Registro'];

    $consulta = "SELECT ID_Wishlist, Imagen, Nombre, Privacidad, Descripcion, ID_User 
                FROM wishlist
                WHERE ID_User = '$IDUser'";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        if($fila['Privacidad'] == 1){
            $fila['Privacidad'] = "privada";
        }else{
            $fila['Privacidad'] = "pública";
        }
        
?>

    <li><a class="dropdown-item" href="../ListN/AddProduct.php?IDBtn=<?php echo $fila['ID_Wishlist'];?>&IDProd=<?php echo $idBtn;?>"><?php echo $fila['Nombre'] ?></a></li>

<?php endwhile; ?>