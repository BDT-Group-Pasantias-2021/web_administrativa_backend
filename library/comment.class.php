<?php

    class commentClass{
        private $idComment;
        private $idReaction;
        private $authorReaction;
        private $contentReaction;
        private $author;
        private $notice; 
        private $text;

        public function __construct($idComment = 0, $idReaction = 0, $authorReaction = 0, $contentReaction = "", $author = 0, $notice = 0, $text = ""){
            $this->idComment = $idComment;
            $this->idReaction = $idReaction;
            $this->authorReaction = 0;
            $this->contentReaction = 0;
            $this->author = $author;
            $this->notice = $notice;
            $this->text = $text;
        }

        /*-- ?action=insertReaction&idComment=&authorReaction=&contentReaction= --*/
        public function insertReaction(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT insert_reaction(".$this->idComment.", ".$this->authorReaction.",'".$this->contentReaction."') AS `Message`;");
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
        
        /*-- ?action=editComment&idComment=&author=&text= --*/
        public function editComment(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT edit_comment(".$this->idComment.",'".$this->text."',".$this->author.") AS Message;");
        } 
                
        /*-- ?action=deleteComment&idComment=&author= --*/
        public function deleteComment(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT delete_comment(".$this->idComment.", ".$this->author.") AS Message;");
        } 

    }
?>