<?php
    
    error_reporting(0);

    $baseUrl = "../../";
    include_once $baseUrl.'include/headerConfig.php';

    $dbc = new PDOClass();
    $dataGet = $_REQUEST;
    $actionGet = $_REQUEST['action'];
    $searchAction = new searchAction();

    $dataReturn = "No data...";

    class searchAction{
        
        /* USERS FUNCTIONS */
        
        function getRankUser($dataGet){
            $actionClass = new userClass( $dataGet['email'], $dataGet['password']);
            return $actionClass->getRankUser();
        }
        
        function passRecovery($dataGet){
            $actionClass = new userClass( $dataGet['email']);
            return $actionClass->passRecovery();
        }

        /* COMMENTS FUNCTIONS */
        
        function deleteReaction($dataGet){
            $actionClass = new commentClass( $dataGet['idReaction']);
            return $actionClass->deleteReaction();
        }

        /* NOTICES FUNCTIONS */

        function createNotice($dataGet){
            $actionClass = new noticeClass($dataGet[''], $dataGet['title'], $dataGet['header'], $dataGet['text'], $dataGet['category'], $dataGet['channel'], $dataGet['status'], $dataGet['author']);
            return $actionClass->createNotice();
        }

        function deleteNotice($dataGet){
            $actionClass = new noticeClass($dataGet[''], $dataGet['id'], $dataGet['author']);
            return $actionClass->deleteNotice();
        }
    }
    

    switch($actionGet){
        case "getRankUser":
            $dataReturn = $searchAction->getRankUser($dataGet);
            break;
        case "passRecovery":
            $dataReturn = $searchAction->passRecovery($dataGet);
            break;
        case "deleteReaction":
            $dataReturn = $searchAction->deleteReaction($dataGet);
            break;
        case "createNotice":
            $dataReturn = $searchAction->createNotice($dataGet);
            break;
        case "deleteNotice":
            $dataReturn = $searchAction->deleteNotice($dataGet);
            break;
    }

    $dataReturn = utf8_ansi(json_encode($dataReturn));

    echo $dataReturn;
    
?>
