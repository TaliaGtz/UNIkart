<?php

    session_start();    //Inicia una nueva sesión o reanuda la existente
    $login = $_SESSION['login'];

    if(!$login){
        $url = "Landing%20Page/Landing.html";
        include("../PhpDocs/header.php");
        //header("Location: http://localhost:8080/unikart2/Landing%20Page/Landing.html");
    }else{
        $user = $_SESSION['user'];
    }

?>