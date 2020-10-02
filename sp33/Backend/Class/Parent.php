<?php 
    class P{
        protected $data;
        protected $time;

        public function __construct(
            $data,
            $time
        )
        {
            $this->data = $data;
            $this->time = $time;        
        }

        /**
         * Get the value of data
         */ 
        public function getData()
        {
                return $this->data;
        }

        /**
         * Set the value of data
         *
         * @return  self
         */ 
        public function setData($data)
        {
                $this->data = $data;

                return $this;
        }

        /**
         * Get the value of time
         */ 
        public function getTime()
        {
                return $this->time;
        }

        /**
         * Set the value of time
         *
         * @return  self
         */ 
        public function setTime($time)
        {
                $this->time = $time;

                return $this;
        }
        
        public function verify($data, $type, $status){
            $location = '';
            if($type == "Temperature"){
                $location = '../Data/Temperature.json';
            }else if($type == "AtmosphericPressure"){
                $location = '../Data/AtmosphericPressure.json';
            }else if($type == "River height"){
                $location = '../Data/RiverHeight.json';
            }else if($type == "Flow"){
                $location = '../Data/Flow.json';
            }else if($type == "Precipitation"){
                $location = '../Data/Precipitation.json';
            }else{
                $location = null;
            }

            if($status == "write"){
                $content = $this->getFile($location);
                
                $content[] = array(
                    "data" => $data,
                    "time" => $this->time
                );

                $this->write($content, $location);
            }else{
                echo json_encode($this->getFile($location));
            }
            // $status == "write" ? $this->write($content, $location) : $this->getFile($location);
        }

        public function write($data, $location){
            $file = fopen($location, 'w');
            fwrite($file, json_encode($data));
            fclose($file);

            // echo json_encode($data);
        }

        public function getFile($location){
            $content_file = file_get_contents($location);
            $content = json_decode($content_file, true);

            return $content;
        }
    }
?>