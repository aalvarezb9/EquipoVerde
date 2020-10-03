<?php 
    header("Content-Type: application/json");
    include_once('../Class/Info.php');  
    date_default_timezone_set('America/Tegucigalpa');
    $_POST = json_decode(file_get_contents('php://input'), true);
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            $info = new Info($_GET['type'], (float)$_POST['data'], getdate());
            $info->writeI();
        break;
        case 'GET':
            Info::getData($_GET["fecha"],$_GET["hora"]);
        break;
    }
?>