<?php
        include("../PhpDocs/Conexion.php");
        include("../PhpDocs/validateLogIn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $user = "$_SESSION[ID_media]";
        $query="SELECT nombre, tipo, imagen FROM media;";

        /*$query =   "SELECT FotoPerfil
                        FROM registro
                        WHERE Username='$user'";*/
        $query = mysqli_query($conexion, $query);
        $query = mysqli_fetch_array($query);  //Devuelve un array o NULL
        
        
    ?>
    <img src="data:<?php echo $query['tipo'] ?>;base64,<?php echo base64_encode($query['imagen']); ?>" height="100" width="100" id="image" class="file">
</body>
</html>