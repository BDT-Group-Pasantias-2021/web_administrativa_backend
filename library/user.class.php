<?php

    class userClass{


        private $id;
        private $email;
        private $password;
        private $name;
        private $typeDocument;
        private $documentUser;
        private $fechaNac;
        private $phoneUser;
        private $typeUser;
        private $confirmPassword;

        public function __construct($id = 0, $email = "", $password = "", $name = "", $typeDocument = 0, $documentUser = 0, $fechaNac = "", $phoneUser = 0, $typeUser = 0, $confirmPassword = ""){
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->name = $name;
            $this->typeDocument = $typeDocument;
            $this->documentUser = $documentUser;
            $this->fechaNac = $fechaNac;
            $this->phoneUser = $phoneUser;
            $this->typeUser = $typeUser;
            $this->confirmPassword = $confirmPassword;
        }

        /*-- ?action=getRankUser&email=&password= --*/
        public function getRankUser(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT verify_rank_user('".$this->email."', '".$this->password."') AS `Message`;");
        }
        
        /*-- ?action=passRecovery&email= --*/
        public function passRecovery(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT pass_recovery('".$this->email."') AS `Message`;");
        }

        /*-- ?action=insertUser&name=&email=&typeDocument=&documentUser=&fechaNac=&phoneUser=&typeUser=&password=&confirmPassword= --*/
        public function insertUser(){
            $dbc = new PDOClass();
            return $dbc-> getQuery("SELECT insert_user('".$this->name."', '".$this->email."', ".$this->typeDocument.", '".$this->documentUser."', '".$this->fechaNac."', ".$this->phoneUser.", ".$this->typeUser.", '".$this->password."', '".$this->confirmPassword."') AS `Message`;");
        }

        /*-- ?action=restrictNotice&id= -- */
        public function restrictNotice(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT restrict_notice('".$this->id."') AS `Message`;");
        }
         /*-- ?action=getAgeUser&id= -- */
         public function getAgeUser(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT get_age_user('".$this->id."') AS `Message`;");
        }
    }


?>