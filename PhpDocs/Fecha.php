<?php
function formatearFecha($fecha){
    return date('g:i a', strtotime($fecha));
}
?>