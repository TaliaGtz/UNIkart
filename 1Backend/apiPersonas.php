<?php

include_once '../1Backend/persona.php';

class ApiPersonas{
    function getAll(){
        $persona = new Persona();
        $personas = array();
        $personas["items"] = array();

        $res = $persona->obtenerPersonas();

        if($res->rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'ID' => $row['ID_Registro'],
                    'User' => $row['Username']
                );
                array_push($personas['items'], $item);
            }
            echo json_encode($personas);
        }else{
            echo json_encode(array('mensaje' => 'No hay personas registradas'));
        }
    }
}

?>