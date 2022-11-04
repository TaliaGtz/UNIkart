<?php

include_once 'db.php';

class Area extends DB{
    function obtenerAreas(){
        $query = $this->connect()->query('SELECT * FROM areas');

        return $query;
    }
}

?>