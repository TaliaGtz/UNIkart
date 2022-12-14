<?php

    $user = "$_SESSION[ID_media]";
    $query  = mysqli_query($conexion,'CALL sp_4Var(8, "'.$user.'");');
    $query = mysqli_fetch_array($query);  //Devuelve un array o NULL
    while(mysqli_next_result($conexion)){;}
    
?>