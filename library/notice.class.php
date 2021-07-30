<?php
    class noticeClass{
        private $id;
        private $title;
        private $header;
        private $text;
        private $category;
        private $channel;
        private $status;
        private $author;
        private $dateCreated;
        private $dateEdited;

        public function __construct($id = 0, $title = "", $header = "", $text = "", $category = 0, $channel = 0, $status = 0, $author = 0, $dateCreated = "", $dateEdited = ""){
            $this->id = $id;
            $this->title = $title;
            $this->header = $header;
            $this->text = $text;
            $this->category = $category;
            $this->channel = $channel;
            $this->status = $status;
            $this->author = $author;
            $this->dateCreated = $dateCreated;
            $this->dateEdited = $dateEdited;
        }

        /*-- ?action=create_notice&title=&header=&text=&category=&channel=&status=&author= --*/
        public function createNotice(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT create_notice('".$this->title."', '".$this->header."', '".$this->text."', '".$this->category."', '".$this->channel."', '".$this->status."', '".$this->author.") AS `Message`;");
        }
    }
?>