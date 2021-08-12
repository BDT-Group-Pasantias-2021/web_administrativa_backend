<?php
    
    /**
     * La clase commentClass se utiliza como un punto de interacción con los comentarios y reacciones que se encuentran guardados
     * en la base de datos. Contiene métodos de creación, modificación y eliminado, así como búsqueda básica por autor y noticia.
     */
    class commentClass{        
        /**
         * ID del comentario. 
         *
         * @var int recibida por $_GET
         */
        private $idComment;
                
        /**
         * ID de la reacción (si existe)
         *
         * @var int recibida por $_GET
         */
        private $idReaction;        
        /**
         * Autor de la reacción (si existe)
         * 
         * @var int recibida por $_GET
         */
        private $authorReaction;        
        /**
         * Contenido de la reacción (si existe). Guardado en formato Unicode.
         *
         * @var String recibida por $_GET
         */
        private $contentReaction;
        /**
         * Autor del comentario 
         *
         * @var int recibida por $_GET
         */
        private $author;        
        /**
         * Noticia a la que corresponde el comentario.
         *
         * @var int recibida por $_GET
         */
        private $notice;         
        /**
         * Texto del comentario.
         *
         * @var String recibida por $_GET
         */
        private $text;
        
        /**
         * Constructor único de la clase Comment.
         * @param  int $idComment
         * @param  int $idReaction
         * @param  int $authorReaction
         * @param  String $contentReaction
         * @param  int $author
         * @param  int $notice
         * @param  String $text
         * @return void
         */
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
        /**
         * Se encarga de insertar una reacción relacionada al comentario
         * llamando a la función insert_reaction en la base de datos.
         * @return String Un mensaje que confirma si se ha insertado la reacción o un mensaje de error.
         */
        public function insertReaction(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT insert_reaction(".$this->idComment.", ".$this->authorReaction.",'".$this->contentReaction."') AS `Message`;");
        }

        /*-- ?action=deleteReaction&idReaction= --*/
        /**
         * Se encarga de eliminar una reacción relacionada al comentario
         * llamando a la función delete_reaction en la base de datos.
         * @return String Un mensaje que confirma si se ha eliminado la reacción o un mensaje de error.
         */
        public function deleteReaction(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT delete_reaction(".$this->idReaction.") AS `Message`;");
        }

        /*-- ?action=createComment&author=&notice=&text= --*/
        /**
         * Se encarga de crear un nuevo comentario con los parámetros del constructor
         * llamando a la función create_comment en la base de datos.
         * @return String Un mensaje de confirmación o de error.
         */
        public function createComment(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT create_comment(".$this->author.", ".$this->notice.",'".$this->text."') AS Message;");
        }
        
        /*-- ?action=editComment&idComment=&author=&text= --*/
        /**
         * Se encarga de editar un comentario existente con los parámetros del constructor
         * llamando a la función edit_comment en la base de datos.
         * @return String Un mensaje de confirmación o de error.
         */
        public function editComment(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT edit_comment(".$this->idComment.",'".$this->text."',".$this->author.") AS Message;");
        } 
                
        /*-- ?action=deleteComment&idComment=&author= --*/
        /**
         * Se encarga de eliminar un comentario existente de acuerdo a su ID
         * llamando a la función delete_comment en la base de datos.
         * @return String Un mensaje de confirmación o de error.
         */
        public function deleteComment(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT delete_comment(".$this->idComment.", ".$this->author.") AS Message;");
        } 

        /*-- ?action=searchCommentByAuthor&author= --*/        
        /**
         * Busca comentarios de acuerdo al ID de su autor.
         *
         * @param  int $author ID del autor a buscar
         * @return array Comentarios del autor en cuestión.
         */
        public function searchCommentByAuthor($author){
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL web_administra.search_comment_by_author(".$author.");");
        }

        /*-- ?action=searchCommentByNotice&notice= --*/        
        /**
         * Busca comentarios de acuerdo a la noticia en la que fueron publicados.
         *
         * @param  int $notice ID de la noticia
         * @return array Comentarios en la noticia en cuestión.
         */
        public function searchCommentByNotice($notice){
            $dbc = new PDOClass();
            return $dbc->getQuery("CALL web_administra.search_comment_by_notice(".$notice.");");
        }

    }
?>