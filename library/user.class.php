<?php

    class userClass{


        private $email;
        private $password;

        public function __construct($email = "", $password = ""){
            $this->email = $email;
            $this->password = $password;
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


    }


?>