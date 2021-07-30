<?php

    class PDOClass extends PDO{

        private $host;
        private $database;
        private $user;
        private $password;
        private $debug;

        public function __construct(){
			
			$this->engine = "mysql"; // mysql
			$this->host = "192.168.43.249";
			$this->database = "web_administra";
			$this->user = "root";
			$this->password = "rootwdp";
			$this->debug = false;
			
			$dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
			parent::__construct( $dns, $this->user, $this->password,
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "UTF8"'));

        }

        public function getQuery($a, $unique = false) {
			if ($this->debug) {
				echo "***</br>";
				echo "Execute command: <b>".$a."</b></br>";
				echo "***";
            }
			$sth = parent::prepare($a);
			$sth->execute();
            $drt = $sth->fetchAll(PDO::FETCH_ASSOC);
			if (!$drt) {
				if ($this->debug) {
                    print_r($this->errorInfo());
                }
                return false;
            }else {					
                if ($unique) {
					return $drt[0];
                }else {
					return $drt;
				}
			}
        }

        public function setQuery($a){
			if($this->debug){
				echo "***</br>";
				echo "Execute command: <b>".$a."</b></br>";
				echo "***";
			}    
			$drt=parent::query($a);
			
			if(!$drt){
				if($this->debug){
					print_r($this->errorInfo());   
				}
				return false;
			}else{
				return $drt;
			}
        }
        
        /* Set al modo Debug */
        public function setDebug($debug){
			$this->debug = $debug;
		}
        
        /* Get al modo Debug */
		public function getDebug(){
			return $this->debug;
		}
    }
?>