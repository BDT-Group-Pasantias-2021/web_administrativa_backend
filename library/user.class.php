<?php
    
    /**
     * Es la clase que se encarga de realizar los llamados a todas aquellas Funciones y Stored Procedures relacionadas a la tabla de Usuarios
     * 
     * 
     * 
     */
    class userClass{

        
        /**
         * Variable Id
         *
         * @var Int Esta variable se encarga de almacenar el Identificador del usuario 
         */
        private $id;        
        /**
         * Email
         *
         * @var String Esta variable se encarga de almacenar el Email del usuario
         */
        private $email;        
        /**
         * Password
         *
         * @var String Esta variable se encarga de almacenar la Contraseña del usuario
         */
        private $password;        
        /**
         * Name
         *
         * @var String Esta variable se encarga de almacenar el Nombre del usuario
         */
        private $name;        
        /**
         * Type Document
         *
         * @var Int Esta variable se encarga de almacenar el tipo de documento del usuario
         */
        private $typeDocument;        
        /**
         * Document User
         *
         * @var Int Esta variable se encarga de almacenar el Documento del usuario
         */
        private $documentUser;        
        /**
         * Fecha Nacimiento
         *
         * @var String Esta variable se encarga de almacenar la Fecha de Nacimiento del usuario
         */
        private $fechaNac;        
        /**
         * Phone User
         *
         * @var Int Esta variable se encarga de almacenar el Telefono del usuario
         */
        private $phoneUser;        
        /**
         * Type User
         *
         * @var Int Esta variable se encarga de almacenar el Tipo de usuario
         */
        private $typeUser;        
        /**
         * Confirm Password
         *
         * @var String Esta variable se encarga de almacenar la Confirmacion de Contraseña del usuario
         */
        private $confirmPassword;        
        /**
         * New Confirm Password
         *
         * @var String Esta variable se encarga de almacenar la segunda Confirmacion de Contraseña del usuario
         */
        private $newConfirmPassword;

         /**
         * Constructor único de la clase Usuario.
         * 
         * @param  Int $searchDocumentUser
         * @param  String $userStatus
         * @param  Int $userPhone
         * @param  String $userName
         * @param  Int $userId
         * @param  String $user Email
         * @return void
         */

        public function __construct($id = 0, $email = "", $password = "", $name = "", $typeDocument = 0, $documentUser = 0, $fechaNac = "", $phoneUser = 0, $typeUser = 0, $confirmPassword = "", $newConfirmPassword = ""){
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
            $this->newConfirmPassword = $newConfirmPassword;
        }
        
        
        // FUNCTIONS USER
   
        /**
         * getRankUser se encarga de realizar el llamado a la función getRankUser
         * la cual se encuentra ubicada en la base de datos 
         *
         * @return String Mensaje que devuelve el rango del usuario en cuestion
         */
        public function getRankUser(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT verify_rank_user('".$this->email."', '".$this->password."') AS `Message`;");
        }
        
        /**
         * passRecovery se encarga de realizar el llamado a la función passRecovery
         * la cual se encuentra ubicada en la base de datos 
         *
         * @return String Mensaje que devuelve el estado en el que se encuentra el email insertado, sea valido o no
         */
        public function passRecovery(){ 
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT pass_recovery('".$this->email."') AS `Message`;");
        }

        /**
         * insertUser se encarga de realizar el llamado a la función insertUser
         * la cual se encuentra ubicada en la base de datos 
         *
         * @return String Mensaje que devuelve si el procedimiento se pudo completar correctamente
         */
        public function insertUser(){
            $dbc = new PDOClass();
            return $dbc-> getQuery("SELECT insert_user('".$this->name."', '".$this->email."', ".$this->typeDocument.", '".$this->documentUser."', '".$this->fechaNac."', ".$this->phoneUser.", ".$this->typeUser.", '".$this->password."', '".$this->confirmPassword."') AS `Message`;");
        }

        /**
         * restrictNotice se encarga de realizar el llamado a la función restrictNotice
         * la cual se encuentra ubicada en la base de datos 
         *
         * @return String Mensaje que aporta informacion acerca del acceso que se obtiene a ciertas noticias
         */
        public function restrictNotice(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT restrict_notice('".$this->id."') AS `Message`;");
        }
        
        /**
         * getAgeUser se encarga de realizar el llamado a la función getAgeUser
         * la cual se encuentra ubicada en la base de datos 
         *
         * @return String Mensaje que devuelve la edad del usuario
         */
         public function getAgeUser(){
            $dbc = new PDOClass();
            return $dbc->getQuery("SELECT get_age_user('".$this->id."') AS `Message`;");
        }

        /**
         * changeTypeUser se encarga de realizar el llamado a la función changeTypeUser
         * la cual se encuentra ubicada en la base de datos 
         *
         * @return String Mensaje que especifica si el tipo de usuario pudo ser cambiado con exito
         */
        public function changeTypeUser(){
            $dbc = new PDOClass();
            return $dbc-> getQuery("SELECT change_typeUser('".$this->email."', '".$this->password."', ".$this->typeUser." ) AS `Message`;");
        }

        /**
         * changePassword se encarga de realizar el llamado a la función changePassword
         * la cual se encuentra ubicada en la base de datos 
         *
         * @return String Mensaje que confirma el cambio de contraseña satisfactorio
         */
        public function changePassword(){
            $dbc = new PDOClass();
            return $dbc-> getQuery("SELECT change_pass('".$this->email."', '".$this->password."', '".$this->confirmPassword."', '".$this->newConfirmPassword."')AS `Message`;");
        }
        
        //STORED PROCEDURES USER

        /**
         * searchUserByDocument muestra los resultados encontrados de buscar usuarios a partir del documento
         *
         * @param Int $searchDocumentUser determina el valor que se aplicara para realizar la busqueda
         * @return Object Devuelve todos los resultados encontrados con esos parametros
         */
        public function searchUserByDocument($searchDocumentUser){
            $dbc = new PDOClass();
            return $dbc-> getQuery("CALL web_administra.search_user_by_document(".$searchDocumentUser.");");
        }
        
        /**
         * searchUserByStatus muestra los resultados encontrados de buscar usuarios a partir del estado del mismo
         *
         * @param String $userStatus determina el valor que se aplicara para realizar la busqueda
         * @return Object Devuelve todos los resultados encontrados con esos parametros
         */
        public function searchUserByStatus($userStatus){
            $dbc = new PDOClass();
            return $dbc-> getQuery("CALL web_administra.search_user_by_status('".$userStatus."');");
        }
        
        /**
         * searchUserByPhone muestra los resultados encontrados de buscar usuarios a partir del telefono proporcionado
         *
         * @param Int $userPhone determina el valor que se aplicara para realizar la busqueda
         * @return Object Devuelve todos los resultados encontrados con esos parametros
         */
        public function searchUserByPhone($userPhone){
            $dbc = new PDOClass(); 
            return $dbc-> getQuery("CALL search_user_by_phone('".$userPhone."');");
        }
        
        /**
         * searchUserByName muestra los resultados encontrados de buscar usuarios a partir del nombre proporcionado
         *
         * @param String $userName determina el valor que se aplicara para realizar la busqueda
         * @return Object Devuelve todos los resultados encontrados con esos parametros
         */
        public function searchUserByName($userName){
        $dbc = new PDOClass();
        return $dbc-> getQuery("CALL search_user_by_name('".$userName."');");
        }

        /**
         * searchUserById muestra los resultados encontrados de buscar usuarios a partir del ID proporcionado
         *
         * @param Int $userId determina el valor que se aplicara para realizar la busqueda
         * @return Object Devuelve todos los resultados encontrados con esos parametros
         */
        public function searchUserById($userId){
            $dbc = new PDOClass();
            return $dbc-> getQuery("CALL search_user_by_id('".$userId."');");
        }

        /**
         * searchUserByEmail muestra los resultados encontrados de buscar usuarios a partir del email proporcionado
         *
         * @param String $userEmail determina el valor que se aplicara para realizar la busqueda
         * @return Object Devuelve todos los resultados encontrados con esos parametros
         */
        public function searchUserByEmail($userEmail){
            $dbc = new PDOClass();
            return $dbc-> getQuery("CALL search_user_by_email('".$userEmail."');");
        }

    }
?>