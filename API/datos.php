<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');   //CORS

if($_GET['variable']){
    include_once 'conexion.php';

    $get = $_GET['variable'];
    
    //$consultaCat  = mysqli_query($conexion,'CALL sp_cat(2, "'.$Category.'");');
    //$consultaCat = mysqli_fetch_array($consultaCat);  //Devuelve un array o NULL
    //while(mysqli_next_result($conexion)){;}
    
    $sql = 'CALL sp_ultSelect(1, "'.$get.'", "", "", "", "", "");';

    /*$sql = "SELECT ID_Registro, Username, Contrasenia, Rol FROM registro WHERE Username = '$get'";*/
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