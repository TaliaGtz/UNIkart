<?php
    $user = "$_SESSION[ID_media]";

    $query="SELECT nombre, tipo, imagen FROM media;";

    $query = mysqli_query($conexion, $query);
    $query = mysqli_fetch_array($query);  //Devuelve un array o NULL 
?>
<!-- <img src="data:--><?php //echo $query['tipo'] ?><!--;base64,--><?php //echo base64_encode($query['imagen']); ?><!-- ">-->