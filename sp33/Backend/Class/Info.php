<?php
header("Content-Type: application/json");
    class Info{

        public function conexion(){
            $conexion = mysqli_connect("localhost", "root", "", "proyecto-morazan");
            return $conexion;
        }

        public static function getData($fecha, $hora){
            $con= self::conexion();
            $sql="SELECT * FROM datos WHERE fecha='$fecha' AND hora='$hora'";
            $resultado= $con ->query($sql);
            $data = array();
            while($row = $resultado ->fetch_assoc()){
                $data[]=$row;
            }

            echo json_encode($data);
        }


        public static function obtenerTodo(){
            $con= self::conexion();
            $sql="SELECT * FROM datos";
            $resultado= $con ->query($sql);
            $data = array();
            while($row = $resultado ->fetch_assoc()){
                $data[]=$row;
            }

            echo json_encode($data);
        }


    }
?>