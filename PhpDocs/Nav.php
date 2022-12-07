<?php
    $user=$_SESSION['user'];

    //Queremos el ID del usuario
    $consulta =   "SELECT ID_Registro, Rol
                    FROM registro
                    WHERE Username = '$user'";
    $consulta = mysqli_query($conexion, $consulta);
    $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
    $user = $consulta['ID_Registro'];
    $Rol = $consulta['Rol'];

    $consultaWL =   "SELECT ID_Carrito, ID_KartList
                    FROM carrito
                    WHERE ID_User='$user'";
    $consultaWL = mysqli_query($conexion, $consultaWL);
    $consultaWL = mysqli_fetch_array($consultaWL);  //Devuelve un array o NULL
    if($consultaWL){
        $ID_KartList = $consultaWL['ID_KartList'];
    }else{
        $ID_KartList = rand(10000, 65535);
        $sql1 = "INSERT INTO carrito 
                VALUES(
                    '$user',
                    '',
                    '$ID_KartList',
                    '$user',
                    '', 
                    ''
                )";

        if(mysqli_query($conexion, $sql1)){  //Ejecutamos el query y verificamos si se guardaron los datos
            //header("Location: http://localhost:8080/unikart2/Producto/ListN.php?IDBtn=$ID_KartList&IDProd=$IDProd");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }
    
?>
<header class="header">
    <nav class="nav">
        <a href="../Home/Home.php"><img src="../ExtraDocs/UK.png" height="70" width="70" class="logo"></a>
        <div class="empty"></div>
        <div class="empty"></div>
        <div class="empty"></div>
        <div class="empty"></div>
        <div class="empty"></div>
        <ul id="navList" class="nav-menu" >
            <a href="../Home/Home.php" class="nav-menu-link nav-link"><li class="nav-menu-item">Home</li></a>
            <a href="../UserPerfil/UserPerfil.php" class="nav-menu-link nav-link"><li class="nav-menu-item">Mi Perfil</li></a>
            <a href="../WishList/WishList.php" class="nav-menu-link nav-link"><li class="nav-menu-item">Wishlists</li></a>
            <a href="../ConsultaPedidos/PedC.php" class="nav-menu-link nav-link"><li class="nav-menu-item">Consulta de pedidos</li></a>
            <?php if ($Rol == '2' || $Rol == '4') {    //1:comprador, 2:vendedor, 3:repartidor, 4:admin ?> 
                <a href="../ConsultaVentas/VenC.php" class="nav-menu-link nav-link"><li class="nav-menu-item">Consulta de ventas</li></a>
            <?php } ?>
            <a href="../PhpDocs/CerrarSesion.php" class="nav-menu-link nav-link"><li class="nav-menu-item">Cerrar Sesión</li></a>
        </ul>  
        <div class="btns">
            <a href="../Producto/ListN.php?IDBtn=<?php echo $ID_KartList?>"><button id="cart" class="cart"><i class="fa-solid fa-cart-shopping"></i></button></a>
            <button id="bars" class="nav-toggle"><i id="iBars" class="fas fa-bars"></i></button>
        </div>
    </nav>
</header>