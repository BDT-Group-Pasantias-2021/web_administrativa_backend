<?php

    include_once "PDO.config.php";
    include_once "listClass.php";
    include_once "function.php";

    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header('Content-Type: text/html; charset=utf-8');
    
?>