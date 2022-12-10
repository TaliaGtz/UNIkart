<?php

include_once '../1Backend/db.php';

class Persona extends DB{
    function obtenerPersonas(){
        $query = $this->connect()->query('SELECT * FROM registro');

        return $query;
    }
}

?>