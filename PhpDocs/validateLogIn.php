<?php

    session_start();    //Inicia una nueva sesión o reanuda la existente
    $login = $_SESSION['login'];

    if(!$login){
        header("Location: http://localhost:8080/unikart2/Landing Page/Landing.html");
    }else{
        $user = $_SESSION['user'];
    }

?>