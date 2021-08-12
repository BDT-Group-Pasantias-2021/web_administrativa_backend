<?php
    
    /**
     * noticeClass es utilizada para crear un nuevo objeto noticia el cual almacena las funciones y store procedures correspondiente
     * tanto para búsquedas y su edición, creación y eliminación
     */
    class noticeClass{        
        /**
         * Identificador
         *
         * @var Int recibida por método GET
         */
        private $id;        
        /**
         * Título
         *
         * @var String recibida por método GET
         */
        private $title;        
        /**
         * Ruta de la imagen con extensión ".png" o ".jpg"
         *
         * @var String recibida por método GET
         */        
        private $header;        
        /**
         * Contenido principal de la noticia
         *
         * @var String recibida por método GET
         */
        private $text;        
        /**
         * Categoría o etiqueta
         *
         * @var String recibida por método GET
         */
        private $category;        
        /**
         * Prioridad para su búsqueda en relación a la tabla "list_category"
         *
         * @var Int recibida por método GET
         */
        private $channel;        
        /**
         * Estado actual de visibilidad o revisión en relación a la tabla "list_status"
         *
         * @var Int recibida por método GET
         */
        private $status;        
        /**
         * Autor, escritor o publicador de la noticia en relación a la tabla "list_user"
         *
         * @var Int recibida por método GET
         */
        private $author;        
        /**
         * Fecha de publicación
         *
         * @var String recibida por método GET
         */
        private $dateCreated;        
        /**
         * Última fecha de actualización
         *
         * @var String recibida por método GET
         */
        private $dateEdited;
        
        /**
         *
         * @param  Int $id
         * @param  String $title
         * @param  String $header
         * @param  String $text
         * @param  String $category
         * @param  Int $channel
         * @param  Int $status
         * @param  Int $author
         * @param  String $dateCreated
         * @param  String $dateEdited
         */
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
   
        /**
         * Se encarga de crear una noticia con los respectivos parametros comprobando cada uno de ellos
         * 
         * @return String devuelve un mensaje de éxito o un mensaje de error correspondiente a la operacion realizada
         */
        public function createNotice(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT create_notice('".$this->title."', '".$this->header."', '".$this->text."', ".$this->category.", ".$this->channel.", ".$this->status.", ".$this->author.") AS `Message`;");
        }
        
        /**
         * Se encarga de editar una noticia seleccionada siendo actualizada con los parametros recibidos
         * 
         * @return String devuelve un mensaje de éxito o un mensaje de error correspondiente a la operacion realizada
         */
        public function editNotice(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT edit_notice(".$this->id.", '".$this->title."', '".$this->header."', '".$this->text."', ".$this->category.", ".$this->channel.", ".$this->author.") AS `Message`;");
        }
        
        /**
         * Se encarga de actualizar el estado de una noticia seleccionada
         * 
         * @return String devuelve un mensaje de éxito o un mensaje de error correspondiente a la operacion realizada
         */
        public function editNoticeStatus(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT edit_notice_status('".$this->id."', ".$this->status.") AS `Message`;");
        }

        /**
         * Se encarga de eliminar una noticia seleccionada
         * 
         * @return String devuelve un mensaje de éxito o un mensaje de error correspondiente a la operacion realizada
         */
        public function deleteNotice(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT delete_notice('".$this->id."', ".$this->author.") AS `Message`;");
        }
        
        /**
         * Selecciona aquellas noticias que identifiquen el valor de búsqueda en el campo elegido
         *
         * @param  String $campo identifica el campo a utilizar para la búsqueda
         * @param  String $valor identifica la cadena de búsqueda
         * @return Object devuelve un objeto con los registros encontrados de la consulta
         */
        public function generalNoticeSearch($campo, $valor){
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL web_administra.general_notice_search(".$campo.", '".$valor."');");
        }
        
        /**
         * Selecciona aquellas noticias con un estado específico
         *
         * @param  String $status identifica el nombre del estado a buscar
         * @return Object devuelve un objeto con los registros encontrados de la consulta
         */
        public function searchActiveNotification($status){
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL web_administra.search_active_notification(".$status.");");
        }

        /**
         * Selecciona aquellas noticias en las que encuentre el valor de búsqueda en su título
         *
         * @param  String $title identifica el valor de búsqueda
         * @return Object devuelve un objeto con los registros encontrados de la consulta
         */
        public function searchNotification($title){
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL web_administra.search_notification('".$title."');");
        }
        
        /**
         * Selecciona aquellas noticias en las que encuentre el valor de búsqueda en su contenido, título o categoría
         *
         * @param  String $valor identifica el valor de búsqueda
         * @return Object devuelve un objeto con los registros encontrados de la consulta
         */
        public function textNoticeSearch($valor){
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL web_administra.text_notice_search('".$valor."');");
        }
    }
?>