<?php

date_default_timezone_set('America/Mexico_City');// Funcion de zona horaria para obtener la hora correcta

function getStamp(){
    $now = (string)microtime();
    $now = explode(' ', $now);
    $mm = explode('.', $now[0]);
    $mm = $mm[1];
    $now = $now[1];
    $segundos = $now % 60;
    $segundos = $segundos < 10 ? "$segundos" : $segundos;
    return strval(date("dmyhi",mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"))) . "$segundos$mm");
}

$now = getStamp();

//echo $now;

?>