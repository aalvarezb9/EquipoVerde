<?php
include_once("../Class/Descarga.php");
header("Content-Type: application/json");
switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        Descarga::obtenerDatos();
    break;
}

?>