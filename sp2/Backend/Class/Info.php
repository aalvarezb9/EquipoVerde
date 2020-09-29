<?php
include_once('Parent.php');
    class Info extends P{
        private $type;

        public function __construct(
            $type,
            $data,
            $time
        )
        {
            parent::__construct($data, $time);
            $this->type = $type;        
        }

        public function writeI(){ //public function write($data, $type)
            parent::verify($this->data, $this->type, "write");
        }

        public function getFileI(){
            parent::verify('', $this->type, "getFile");
        }

        /**
         * Get the value of type
         */ 
        public function getType()
        {
                return $this->type;
        }

        /**
         * Set the value of type
         *
         * @return  self
         */ 
        public function setType($type)
        {
                $this->type = $type;

                return $this;
        }
    }
?>