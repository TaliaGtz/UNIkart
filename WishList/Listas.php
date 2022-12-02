<?php
    
    include("../PhpDocs/PhpInclude.php");

    $userName = $_SESSION['user'];

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

    <article id="" class="article" style="display:block;">
        <img src="../ExtraDocs/Menu.png" height="70px" width="70px" id="image" class="file">
        <div class="contDiv">
            <h2><?php echo $fila['Nombre'] ?></h2>
            <p> Lista <?php echo $fila['Privacidad'] ?></p>
            <p> Descripción: <?php echo $fila['Descripcion'] ?></p>
            <a href="../ListN/ListN.php?IDBtn=<?php echo $fila['ID_Wishlist']; ?>" id="arrow"><i id="view" class="fa-solid fa-circle-chevron-right"></i></a>
            <br><hr>
        </div>
    </article>

<?php endwhile; ?>