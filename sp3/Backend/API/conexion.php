<?php
    function conexion(){
        $conexion = mysqli_connect("localhost", "root", "", "proyecto-morazan");
       return $conexion;
    }

?>