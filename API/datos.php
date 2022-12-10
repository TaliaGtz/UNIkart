<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');   //CORS

if($_GET['variable']){
    include_once 'conexion.php';

    $get = $_GET['variable'];
    $sql = "SELECT * FROM registro WHERE Username = '$get'";
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();
    $datos = $sentencia->fetchAll();

}/*else{
    echo "Solicitud no encontrada";
}*/
//$datos = ['dolar' => 500, 'euro' => 700];

//$peticion = $_GET['variable'];

echo json_encode($datos);

?>