<?php
    class Info{
        private $alturaRio;
        private $caudal;
        private $fecha;
        private $hora;
        private $marcaTiempo;
        private $precipitacion;
        private $presionAtmosferica;
        private $temperatura;

        public function __construct(
            $alturaRio,
            $caudal,
            $fecha,
            $hora,
            $marcaTiempo,
            $precipitacion,
            $presionAtmosferica,
            $temperatura
        ){
            $this->alturaRio = $alturaRio;
            $this->caudal = $caudal;
            $this->fecha = $fecha;
            $this->hora = $hora;
            $this->marcaTiempo = $marcaTiempo;
            $this->precipitacion = $precipitacion;
            $this->presionAtmosferica = $presionAtmosferica;
            $this->temperatura = $temperatura;
        }

        public function getAlturaRio(){
            return $this->alturaRio;
        }

        public function setAlturaRio($alturaRio){
            $this->alturaRio = $alturaRio;
            return $this;
        }

        public function getCaudal(){
            return $this->caudal;
        }

        public function setCaudal($caudal){
            $this->caudal = $caudal;
            return $this;
        }
        public function getFecha(){
            return $this->fecha;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
            return $this;
        }
        public function getHora(){
            return $this->hora;
        }

        public function setHora($hora){
            $this->hora = $hora;
            return $this;
        }
        public function getMarcaTiempo(){
            return $this->marcaTiempo;
        }

        public function setMarcaTiempo($marcaTiempo){
            $this->marcaTiempo = $marcaTiempo;
            return $this;
        }
        public function getPrecipitacion(){
            return $this->precipitacion;
        }

        public function setPrecipitacion($precipitacion){
            $this->precipitacion = $precipitacion;
            return $this;
        }
        public function getPresionAtmosferica(){
            return $this->presionAtmosferica;
        }

        public function setPresionAtmosferica($presionAtmosferica){
            $this->presionAtmosferica = $presionAtmosferica;
            return $this;
        }
        public function getTemperatura(){
            return $this->temperatura;
        }

        public function setTemperatura($temperatura){
            $this->temperatura = $temperatura;
            return $this;
        }
        

        public function conexion(){
            $conexion = mysqli_connect("localhost", "root", "", "proyecto-morazan");
            return $conexion;
        }

        public static function getData($fecha, $hora){

            $con= self::conexion();
            $sql="SELECT * FROM datos WHERE fecha='$fecha' and hora='$hora'";
            $resultado= $con ->query($sql);
            $data = array();
            while($row = $resultado ->fetch_assoc()){
                $data[]=$row;
            }
            
            return $data;
        }
    }
?>