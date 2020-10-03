<?php
include_once("../Class/Descarga.php");

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        Descarga::getData();
    break;
}

?>