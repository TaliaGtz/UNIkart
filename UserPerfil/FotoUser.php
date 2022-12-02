<?php

    $user = "$_SESSION[ID_media]";
    $query="SELECT nombre, tipo, imagen 
            FROM media 
            WHERE ID_media = '$user'";

    $query = mysqli_query($conexion, $query);
    $query = mysqli_fetch_array($query);  //Devuelve un array o NULL
    
    
?>