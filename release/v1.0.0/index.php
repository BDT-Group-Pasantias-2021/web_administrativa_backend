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
            $actionClass = new userClass( 0,$dataGet['email'], $dataGet['password'], "",0,"", "","", 0, "", "");
            return $actionClass->getRankUser();
        }
        
        function passRecovery($dataGet){
            $actionClass = new userClass( 0,$dataGet['email'], "", "",0,"", "","", 0, "", "");
            return $actionClass->passRecovery();
        }

        function insertUser($dataGet){
            $actionClass = new userClass( 0, $dataGet['email'], $dataGet['password'], $dataGet['name'], $dataGet['typeDocument'], $dataGet['documentUser'], $dataGet['fechaNac'], $dataGet['phoneUser'], $dataGet['typeUser'], $dataGet['confirmPassword'],"");
            return $actionClass->insertUser();
        }

        function restrictNotice($dataGet){
            $actionClass = new userClass( $dataGet['id'],"", "", "",0,"", "","", 0, "","");
            return $actionClass->restrictNotice();
        }
        function getAgeUser($dataGet){
            $actionClass = new userClass( $dataGet['id'],"", "", "",0,"", "","", 0, "","");
            return $actionClass->getAgeUser();
        }

        function changeTypeUser($dataGet){
            $actionClass = new userClass( 0, $dataGet['email'], $dataGet['password'], "", 0, 0, "", 0, $dataGet['typeUser'], "", "");
            return $actionClass->changeTypeUser();
        }
        
        function changePassword($dataGet){
            $actionClass = new userClass( 0, $dataGet['email'], $dataGet['password'], "", 0, 0, "", 0, 0, "$dataGet['confirmPassword']", "$dataGet['newConfirmPassword']");
            return $actionClass->changePassword();
        }
        

        /* COMMENTS FUNCTIONS */
        
        function deleteReaction($dataGet){
            $actionClass = new commentClass( 0, $dataGet['idReaction'], 0, "", 0, 0, "");
            return $actionClass->deleteReaction();
        }

        function insertReaction($dataGet){
            $actionClass = new commentClass( $dataGet['idComment'], 0, $dataGet['authorReaction'], $dataGet['contentReaction'], 0, 0, "");
            return $actionClass->insertReaction();
        }

        function createComment($dataGet){
            $actionClass = new commentClass( 0, 0, 0, "", $dataGet['author'], $dataGet['notice'], $dataGet['text'] );
            return $actionClass->createComment();
        }

        function editComment($dataGet){
            $actionClass = new commentClass($dataGet['idComment'], 0, 0, "", $dataGet['author'], 0, $dataGet['text'] );
            return $actionClass->editComment();
        }

        function deleteComment($dataGet){
            $actionClass = new commentClass($dataGet['idComment'], 0, 0, "", $dataGet['author'], 0, "");
            return $actionClass->deleteComment();
        }

        /* NOTICES FUNCTIONS */

        function createNotice($dataGet){
            $actionClass = new noticeClass($dataGet['id'], $dataGet['title'], $dataGet['header'], $dataGet['text'], $dataGet['category'], $dataGet['channel'], $dataGet['status'], $dataGet['author']);
            return $actionClass->createNotice();
        }
        
        function editNotice($dataGet){
            $actionClass = new noticeClass($dataGet['id'], $dataGet['title'], $dataGet['header'], $dataGet['text'], $dataGet['category'], $dataGet['channel'], $dataGet['status'], $dataGet['author']);
            return $actionClass->editNotice();
        }

        function editNoticeStatus($dataGet){
            $actionClass = new noticeClass($dataGet['id'], $dataGet['title'], $dataGet['header'], $dataGet['text'], $dataGet['category'], $dataGet['channel'], $dataGet['status']);
            return $actionClass->editNoticeStatus();
        }

        function deleteNotice($dataGet){
            $actionClass = new noticeClass($dataGet['id'], $dataGet['title'], $dataGet['header'], $dataGet['text'], $dataGet['category'], $dataGet['channel'], $dataGet['status'], $dataGet['author']);
            return $actionClass->deleteNotice();
        }

        /* NOTICES STORED PROCEDURES */

        function generalNoticeSearch($dataGet){
            $actionClass = new noticeClass(0, "", "", "", "", 0, 0, 0, "", "");
            return $actionClass->generalNoticeSearch($dataGet['campo'], $dataGet['valor']);
        }

        function searchActiveNotification($dataGet){
            $actionClass = new noticeClass(0, "", "", "", "", 0, 0, 0, "", "");
            return $actionClass->searchActiveNotification($dataGet['status']);
        }

        function searhNotification($dataGet){
            $actionClass = new noticeClass(0, "", "", "", "", 0, 0, 0, "", "");
            return $actionClass->searhNotification($dataGet['title']);
        }

        function textNoticeSearch($dataGet){
            $actionClass = new noticeClass(0, "", "", "", "", 0, 0, 0, "", "");
            return $actionClass->textNoticeSearch($dataGet['title']);
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
        case "deleteReaction":
            $dataReturn = $searchAction->deleteReaction($dataGet);
            break;
        case "createComment":
            $dataReturn = $searchAction->createComment($dataGet);
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
        case "generalNoticeSearch":
            $dataReturn = $searchAction->generalNoticeSearch($dataGet);
            break;
        case "searchActiveNotification":
            $dataReturn = $searchAction->searchActiveNotification($dataGet);
            break;
        case "searhNotification":
            $dataReturn = $searchAction->searhNotification($dataGet);
            break;
        case "textNoticeSearch":
            $dataReturn = $searchAction->textNoticeSearch($dataGet);
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
    <title>Pasantías - BDT 2021</title>
</head>
</head>
<body>
    <div style="display: flex; align-items: center;">
        <h2 style="display:inline-block; padding-right: 10px;">¡Hola de nuevo!</h2>
        <img src="https://a.slack-edge.com/6c404/marketing/img/homepage/bold-existing-users/waving-hand.gif">
    </div>
    <div><?php echo $dataReturn;?></div>    
</body>
</html>