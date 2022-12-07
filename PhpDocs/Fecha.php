<?php
function formatearFecha($fecha){
    return Date('g:i a', strtotime($fecha));
}

function formatearFechaEntregas($fecha){
    return date('d/M/Y', strtotime($fecha));
}
?>