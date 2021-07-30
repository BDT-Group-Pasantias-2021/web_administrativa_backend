<?php

    class commentClass{


        private $idReaction;
        private $author;
        private $notice; 
        private $text;

        public function __construct($idReaction = 0, $author = 0, $notice = 0, $text = ""){
            $this->idReaction = $idReaction;
            $this->author = $author;
            $this->notice = $notice;
            $this->text = $text;
        }

        /*-- ?action=deleteReaction&idReaction= --*/
        public function deleteReaction(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT delete_reaction(".$this->idReaction.") AS `Message`;");
        }

        /*-- ?action=createComment&author=&notice=&text= --*/
        public function createComment(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT create_comment(".$this->author.", ".$this->notice.",'".$this->text."') AS Message;");
        }

    }
?>