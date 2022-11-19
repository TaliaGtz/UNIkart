<?php

    session_start();    //Inicia una nueva sesión o reanuda la existente

    $_SESSION = array();    //Destruye todas las variables de sesión
    
    session_destroy();      //Destruye la sesión
    header('Location: http://localhost:8080/unikart2/Landing Page/Landing.html')

?>