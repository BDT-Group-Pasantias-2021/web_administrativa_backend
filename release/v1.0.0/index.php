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
        
        function getRankUser($dataGet){
        $actionClass = new userClass( $dataGet['email'], $dataGet['password']);
            return $actionClass->getRankUser();
        }

        function deleteReaction($dataGet){
        
            $actionClass = new commentClass( $dataGet['idReaction']);
            return $actionClass->deleteReaction();
        }
    }

    switch($actionGet){
        case "getRankUser":
            $dataReturn = $searchAction->getRankUser($dataGet);
            break;
        case "deleteReaction":
            $dataReturn = $searchAction->deleteReaction($dataGet);
            break;
    }

    $dataReturn = utf8_ansi(json_encode($dataReturn));

    echo $dataReturn;
    
?>