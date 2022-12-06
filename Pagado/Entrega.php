<?php

"INSERT INTO entregas
(CODE, Total, Fecha, ID_User, ID_Kart) 
SELECT CODE, Total, FechaKart, ID_User, ID_KartList
FROM carrito 
WHERE ID_KartList = 17302"

?>