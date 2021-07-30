<?php

    class workClass{

        private $id;
        private $receiver;
        private $transmitter;
        private $platform;
        private $status;
        private $affair;
        private $message;
        private $note;

        public function __construct($id = 0, $receiver = 0, $transmitter = 0, $platform = 0, $status = 0, $affair = '', $message = '', $note = ''){
            $this->id = $id;
            $this->receiver = $receiver;
            $this->transmitter = $transmitter;
            $this->platform = $platform;
            $this->status = $status;
            $this->affair = $affair;
            $this->message = $message;
            $this->note = $note;
        }

        /*-- ?action=getWork&receiver=0&transmitter=0&status=0 --*/
        public function getWork(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL get_work(".$this->receiver.", ".$this->transmitter.", ".$this->status.");");
        }
        
        /*-- ?action=addWork&transmitter=0&receiver=0&platform=0&affair=&message= --*/
        public function addWork(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT add_work(".$this->transmitter.", ".$this->receiver.", ".$this->platform.", '".$this->affair."', '".$this->message."') AS `Message`;");
        }

        /*-- ?action=updateWork&id=0&receiver=0&status=0&note= --*/
        public function updateWork(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT update_work(".$this->id.", ".$this->receiver.", ".$this->status.", '".$this->note."') AS `Message`;");
        }

    }

?>