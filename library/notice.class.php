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

        public function __construct($id = 0, $title = "", $header = "", $text = "", $category = "", $channel = 0, $status = 0, $author = 0, $dateCreated = "", $dateEdited = ""){
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

        /*-- ?action=createNotice&title=&header=&text=&category=&channel=&status=&author= --*/
        public function createNotice(){
            echo "SELECT create_notice('".$this->title."', '".$this->header."', '".$this->text."', ".$this->category.", ".$this->channel.", ".$this->status.", ".$this->author.") AS `Message`;";
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT create_notice('".$this->title."', '".$this->header."', '".$this->text."', ".$this->category.", ".$this->channel.", ".$this->status.", ".$this->author.") AS `Message`;");
        }

        /*-- ?action=editNotice&id=&title=&header=&text=&category=&channel=&author= --*/
        public function editNotice(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT edit_notice(".$this->id.", '".$this->title."', '".$this->header."', '".$this->text."', ".$this->category.", ".$this->channel.", ".$this->author.") AS `Message`;");
        }
        
        /*-- ?action=editNotice&id=&status= --*/
        public function editNoticeStatus(){
            echo "SELECT edit_notice_status('".$this->id."', ".$this->status.") AS `Message`;";
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT edit_notice_status('".$this->id."', ".$this->status.") AS `Message`;");
        }

        /*-- ?action=deleteNotice&id=&author= --*/
        public function deleteNotice(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT delete_notice('".$this->id."', ".$this->author.") AS `Message`;");
        }

        /*-- ?action=generalNoticeSearch&campo=&valor= --*/
        public function generalNoticeSearch($campo, $valor){
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL web_administra.general_notice_search(".$campo.", '".$valor."');");
        }

        /*-- ?action=searchActiveNotification&campo=&status= --*/
        public function searchActiveNotification($status){
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL web_administra.search_active_notification(".$status.");");
        }

        /*-- ?action=searhNotification&title= --*/
        public function searhNotification($title){
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL web_administra.search_notification('".$title."');");
        }

        /*-- ?action=textNoticeSearch&title= --*/
        public function textNoticeSearch($title){
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL web_administra.text_notice_search('".$title."');");
        }
    }
?>