<?php

    class percentageClass{

        private $receiver;
        private $transmitter;
        private $status;

        public function __construct($receiver = 0, $transmitter = 0, $status = 0){
            $this->receiver = $receiver;
            $this->transmitter = $transmitter;
            $this->status = $status;
        }

        /*-- ?action=getPercentage&receiver=0&transmitter=0&status=0 --*/
        public function getPercentage(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL get_percentage(".$this->receiver.", ".$this->transmitter.", ".$this->status.");");
        }

    }

?>