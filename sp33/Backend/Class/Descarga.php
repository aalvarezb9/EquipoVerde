<?php

class Descarga{
    public function conexion(){
        $conexion = mysqli_connect("localhost", "root", "", "proyecto-morazan");
        return $conexion;
    }

    public static function obtenerDatos(){
        $con=self::conexion();
        $sql = "SELECT * FROM descargas";
        $resultado = $con -> query($sql);
        $data = $resultado ->fetch_assoc();
        return $data;
    }
}

?>