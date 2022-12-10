<?php

$json = array(
    'status' => 200,
    'result' => 'Solicitud GET'
);

echo json_encode($json, http_response_code($json['status']));

?>