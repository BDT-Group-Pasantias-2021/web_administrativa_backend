<?php
    
    //error_reporting(0);

    $baseUrl = "../../";
    include_once $baseUrl.'include/headerConfig.php';

    $dbc = new PDOClass();
    $dataGet = $_REQUEST;
    $actionGet = $_REQUEST['action'];
    $searchAction = new searchAction();

    $dataReturn = "No data...";
    
    /**
     * Ejecuta una función de php de acuerdo a los parámetros recibidos por el método $_GET en su URL
     * para realizar diversas acciones. 
     */
    class searchAction{
        
        /* USERS FUNCTIONS */
                
        /**
         * Ejecuta la función getRankUser de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::getRankUser()
         * @return void
         */
        function getRankUser($dataGet){
            $actionClass = new userClass( 0,$dataGet['email'], $dataGet['password'], "",0,"", "","", 0, "", "");
            return $actionClass->getRankUser();
        }

        /**
         * Ejecuta la función passRecovery de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::passRecovery()
         * @return void
         */
        function passRecovery($dataGet){
            $actionClass = new userClass( 0,$dataGet['email'], "", "",0,"", "","", 0, "", "");
            return $actionClass->passRecovery();
        }

        /**
         * Ejecuta la función insertUser de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::insertUser()
         * @return void
         */
        function insertUser($dataGet){
            $actionClass = new userClass( 0, $dataGet['email'], $dataGet['password'], $dataGet['name'], $dataGet['typeDocument'], $dataGet['documentUser'], $dataGet['fechaNac'], $dataGet['phoneUser'], $dataGet['typeUser'], $dataGet['confirmPassword'],"");
            return $actionClass->insertUser();
        }

        /**
         * Ejecuta la función restrictNotice de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::restrictNotice()
         * @return void
         */
        function restrictNotice($dataGet){
            $actionClass = new userClass( $dataGet['id'],"", "", "",0,"", "","", 0, "","");
            return $actionClass->restrictNotice();
        }

        /**
         * Ejecuta la función getAgeUser de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::getAgeUser()
         * @return void
         */
        function getAgeUser($dataGet){
            $actionClass = new userClass( $dataGet['id'],"", "", "",0,"", "","", 0, "","");
            return $actionClass->getAgeUser();
        }

        /**
         * Ejecuta la función changeTypeUser de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::changeTypeUser()
         * @return void
         */
        function changeTypeUser($dataGet){
            $actionClass = new userClass( 0, $dataGet['email'], $dataGet['password'], "", 0, 0, "", 0, $dataGet['typeUser'], "", "");
            return $actionClass->changeTypeUser();
        }
        
        /**
         * Ejecuta la función changePassword de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::changePassword()
         * @return void
         */
        function changePassword($dataGet){
            $actionClass = new userClass( 0, $dataGet['email'], $dataGet['password'], "", 0, 0, "", 0, 0, $dataGet['confirmPassword'],$dataGet['newConfirmPassword']);
            return $actionClass->changePassword();
        }

        /* USER STORED PROCEDURES */

        /**
         * Ejecuta la función searchUserByStatus de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::searchUserByStatus()
         * @return void
         */
        function searchUserByStatus($dataGet){
            $actionClass = new userClass(0,"","","",0,0,"",0,0,"","");
            return $actionClass->searchUserByStatus($dataGet['userStatus']);
        }
        
        /**
         * Ejecuta la función searchUserByID de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::searchUserByID()
         * @return void
         */
        function searchUserById($dataGet){
            $actionClass = new userClass(0,"","","",0,0,"",0,0,"","");
            return $actionClass->searchUserById($dataGet['userId']);
        }

        /**
         * Ejecuta la función searchUserByEmail de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::searchUserByEmail()
         * @return void
         */
        function searchUserByEmail($dataGet){
            $actionClass = new userClass(0,"","","",0,0,"",0,0,"","");
            return $actionClass->searchUserByEmail($dataGet['userEmail']);
        }

        /**
         * Ejecuta la función searchUserByPhone de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::searchUserByPhone()
         * @return void
         */
        function searchUserByPhone($dataGet){
            $actionClass = new userClass(0,"","","",0,0,"",0,0,"","");
            return $actionClass->searchUserByPhone($dataGet['userPhone']);
        }
        
        /**
         * Ejecuta la función searchUserByName de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::searchUserByName()
         * @return void
         */
        function searchUserByName($dateGet){
            $actionClass = new userClass(0,"","","",0,0,"",0,0,"","");
            return $actionClass->searchUserByName($dataGet['userName']);
        }

        /**
         * Ejecuta la función searchUserByDocument de la clase userClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see user.class.php::searchUserByDocument()
         * @return void
         */
        function searchUserByDocument($dataGet){
            $actionClass = new userClass( 0, "", "", "", 0, 0, "", 0, 0, "", "");
            return $actionClass->searchUserByDocument($dataGet['searchDocumentUser']);
        }

        /* COMMENTS FUNCTIONS */

        /**
         * Ejecuta la función insertReaction de la clase commentClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see comment.class.php::insertReaction()
         * @return void
         */
        function insertReaction($dataGet){
            $actionClass = new commentClass( $dataGet['idComment'], 0, $dataGet['authorReaction'], $dataGet['contentReaction'], 0, 0, "");
            return $actionClass->insertReaction();
        }
        
        /**
         * Ejecuta la función deleteReaction de la clase commentClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see comment.class.php::deleteReaction()
         * @return void
         */
        function deleteReaction($dataGet){
            $actionClass = new commentClass( 0, $dataGet['idReaction'], 0, "", 0, 0, "");
            return $actionClass->deleteReaction();
        }

        /**
         * Ejecuta la función createComment de la clase commentClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see comment.class.php::createComment()
         * @return void
         */
        function createComment($dataGet){
            $actionClass = new commentClass( 0, 0, 0, "", $dataGet['author'], $dataGet['notice'], $dataGet['text'] );
            return $actionClass->createComment();
        }

        /**
         * Ejecuta la función editComment de la clase commentClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see comment.class.php::editComment()
         * @return void
         */
        function editComment($dataGet){
            $actionClass = new commentClass($dataGet['idComment'], 0, 0, "", $dataGet['author'], 0, $dataGet['text'] );
            return $actionClass->editComment();
        }

        /**
         * Ejecuta la función deleteComment de la clase commentClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see comment.class.php::deleteComment()
         * @return void
         */
        function deleteComment($dataGet){
            $actionClass = new commentClass($dataGet['idComment'], 0, 0, "", $dataGet['author'], 0, "");
            return $actionClass->deleteComment();
        }

        /* COMMENTS STORED PROCEDURES */

        /**
         * Ejecuta la función searchCommentByAuthor de la clase commentClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see comment.class.php::searchCommentByAuthor()
         * @return void
         */
        function searchCommentByAuthor($dataGet){
            $actionClass = new commentClass(0, 0, 0, "", 0, 0, "");
            return $actionClass->searchCommentByAuthor($dataGet['author']);
        }

        /**
         * Ejecuta la función searchCommentByNotice de la clase commentClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see comment.class.php::searchCommentByNotice()
         * @return void
         */
        function searchCommentByNotice($dataGet){
            $actionClass = new commentClass(0, 0, 0, "", 0, 0, "");
            return $actionClass->searchCommentByNotice($dataGet['notice']);
        }

        /* NOTICES FUNCTIONS */

        /**
         * Ejecuta la función createNotice de la clase noticeClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see notice.class.php::createNotice()
         * @return void
         */
        function createNotice($dataGet){
            $actionClass = new noticeClass($dataGet['id'], $dataGet['title'], $dataGet['header'], $dataGet['text'], $dataGet['category'], $dataGet['channel'], $dataGet['status'], $dataGet['author']);
            return $actionClass->createNotice();
        }

        /**
         * Ejecuta la función editNotice de la clase noticeClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see notice.class.php::editNotice()
         * @return void
         */
        function editNotice($dataGet){
            $actionClass = new noticeClass($dataGet['id'], $dataGet['title'], $dataGet['header'], $dataGet['text'], $dataGet['category'], $dataGet['channel'], $dataGet['status'], $dataGet['author']);
            return $actionClass->editNotice();
        }

        /**
         * Ejecuta la función editNoticeStatus de la clase noticeClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see notice.class.php::editNoticeStatus()
         * @return void
         */
        function editNoticeStatus($dataGet){
            $actionClass = new noticeClass($dataGet['id'], $dataGet['title'], $dataGet['header'], $dataGet['text'], $dataGet['category'], $dataGet['channel'], $dataGet['status']);
            return $actionClass->editNoticeStatus();
        }

        /**
         * Ejecuta la función deleteNotice de la clase noticeClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see notice.class.php::deleteNotice()
         * @return void
         */
        function deleteNotice($dataGet){
            $actionClass = new noticeClass($dataGet['id'], $dataGet['title'], $dataGet['header'], $dataGet['text'], $dataGet['category'], $dataGet['channel'], $dataGet['status'], $dataGet['author']);
            return $actionClass->deleteNotice();
        }
       

        /* NOTICES STORED PROCEDURES */

        /**
         * Ejecuta la función generalNoticeSearch de la clase noticeClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see notice.class.php::generalNoticeSearch()
         * @return void
         */
        function generalNoticeSearch($dataGet){
            $actionClass = new noticeClass(0, "", "", "", "", 0, 0, 0, "", "");
            return $actionClass->generalNoticeSearch($dataGet['campo'], $dataGet['valor']);
        }

        /**
         * Ejecuta la función searchActiveNotification de la clase noticeClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see notice.class.php::searchActiveNotification()
         * @return void
         */
        function searchActiveNotification($dataGet){
            $actionClass = new noticeClass(0, "", "", "", "", 0, 0, 0, "", "");
            return $actionClass->searchActiveNotification($dataGet['status']);
        }

        /**
         * Ejecuta la función searchNotification de la clase noticeClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see notice.class.php::searchNotification()
         * @return void
         */
        function searchNotification($dataGet){
            $actionClass = new noticeClass(0, "", "", "", "", 0, 0, 0, "", "");
            return $actionClass->searchNotification($dataGet['title']);
        }

        /**
         * Ejecuta la función textNoticeSearch de la clase noticeClass con los parámetros pertinentes.
         *
         * @param  array[] $dataGet Array de parámetros recibidos por el método $_GET 
         * @see notice.class.php::textNoticeSearch()
         * @return void
         */
        function textNoticeSearch($dataGet){
            $actionClass = new noticeClass(0, "", "", "", "", 0, 0, 0, "", "");
            return $actionClass->textNoticeSearch($dataGet['valor']);
        }
    }
    

    switch($actionGet){
        case "getRankUser":
            $dataReturn = $searchAction->getRankUser($dataGet);
            break;
        case "passRecovery":
            $dataReturn = $searchAction->passRecovery($dataGet);
            break;
        case "insertUser":
            $dataReturn = $searchAction->insertUser($dataGet);
            break;
        case "restrictNotice":
            $dataReturn = $searchAction->restrictNotice($dataGet);
            break;
        case "getAgeUser":
            $dataReturn = $searchAction->getAgeUser($dataGet);
            break;
        case "changeTypeUser":
            $dataReturn = $searchAction->changeTypeUser($dataGet);
            break;
        case "changePassword":
            $dataReturn = $searchAction->changePassword($dataGet);
            break;
        case "searchUserByDocument":
            $dataReturn = $searchAction->searchUserByDocument($dataGet);
            break;
        case "searchUserByStatus":
            $dataReturn = $searchAction->searchUserByStatus($dataGet);
            break;
        case "insertReaction":
            $dataReturn = $searchAction->insertReaction($dataGet);
            break;
        case "deleteReaction":
            $dataReturn = $searchAction->deleteReaction($dataGet);
            break;
        case "createComment":
            $dataReturn = $searchAction->createComment($dataGet);
            break;
        case "editComment":
            $dataReturn = $searchAction->editComment($dataGet);
            break;
        case "deleteComment":
            $dataReturn = $searchAction->deleteComment($dataGet);
            break;
        case "createNotice":
            $dataReturn = $searchAction->createNotice($dataGet);
            break;
        case "editNotice":
            $dataReturn = $searchAction->editNotice($dataGet);
            break;
        case "editNoticeStatus":
            $dataReturn = $searchAction->editNoticeStatus($dataGet);
            break;
        case "deleteNotice":
            $dataReturn = $searchAction->deleteNotice($dataGet);
            break;
        case "searchCommentByAuthor":
            $dataReturn = $searchAction->searchCommentByAuthor($dataGet);
            break;
        case "searchCommentByNotice":
            $dataReturn = $searchAction->searchCommentByNotice($dataGet);
            break;
        case "generalNoticeSearch":
            $dataReturn = $searchAction->generalNoticeSearch($dataGet);
            break;
        case "searchActiveNotification":
            $dataReturn = $searchAction->searchActiveNotification($dataGet);
            break;
        case "searchNotification":
            $dataReturn = $searchAction->searchNotification($dataGet);
            break;
        case "textNoticeSearch":
            $dataReturn = $searchAction->textNoticeSearch($dataGet);
            break;
        case "searchUserById":
            $dataReturn = $searchAction->searchUserById($dataGet);
            break;
        case "searchUserByEmail":
            $dataReturn = $searchAction->searchUserByEmail($dataGet);
            break;
        case "searchUserByPhone":
            $dataReturn = $searchAction->searchUserByPhone($dataGet);
            break;
        case "searchUserByName":
            $dataReturn = $searchAction->searchUserByName($dataGet);
            break;
    }

    $dataReturn = utf8_ansi(json_encode($dataReturn));
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/favicon.png">
    <link rel="stylesheet" href="../../css/index.css">
    <title>Pasantías - BDT 2021</title>
</head>
</head>
<body>
    <div class="principal-container">
        <h2>¡Hola de nuevo!</h2>
        <img class="welcome-gif" src="https://a.slack-edge.com/6c404/marketing/img/homepage/bold-existing-users/waving-hand.gif">
    </div>
    <div class="delivered-content">
        <p><?php if(count($dataGet) > 0){
                                    echo print_r($dataGet);
                                } else {
                                    echo "\"No parameters found...\"";
                                };?></p>
    </div>
    <div class="delivered-content">
        <?php echo "<pre>"; 
                echo utf8_ansi(json_encode(json_decode($dataReturn), JSON_PRETTY_PRINT)); 
                echo "</pre>";?>
    </div>
</body>
</html>