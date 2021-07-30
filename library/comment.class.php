<?php

    class commentClass{


        private $idReaction;

        public function __construct($idReaction = 0 ){
            $this->idReaction = $idReaction;
        }

        /*-- ?action=deleteReaction&idReaction= --*/
        public function deleteReaction(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT delete_reaction(".$this->idReaction.") AS `Message`;");
        }

    }
?>