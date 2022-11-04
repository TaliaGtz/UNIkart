<?php

include_once 'area.php';

class ApiAreas{
    function getAll(){
        $area = new Area();
        $areas = array();
        $areas["items"] = array();

        $res = $area->obtenerAreas();

        if($res->rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['id'],
                    'nombre' => $row['nombre']
                );
                array_push($areas['items'], $item);
            }
            echo json_encode($areas);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos registrados'));
        }
    }
}

?>