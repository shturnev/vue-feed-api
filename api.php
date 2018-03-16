<?php
require_once "back/vendor/autoload.php";

$U = new \classes\User();
$user = $U->isAuth($_COOKIE['token']);

if($_REQUEST["method_name"] == "login"){

    try{
       $res = $U->login($_REQUEST);
       header("Location: /");
    }
    catch(Exception $e){
        echo $e->getMessage(); exit;
    }
}
if($_REQUEST["method_name"] == "confirm_email" && $_REQUEST["code"]){

    try{
       $res = $U->confirm_email($_REQUEST["code"]);
       header("Location: /");
    }
    catch(Exception $e){
        echo $e->getMessage(); exit;
    }
}

//clients
if($_REQUEST["method_name"] == "client_create"){
    $O = new \classes\Client();

    try{
        $res = $O->create($_REQUEST, $_COOKIE['token']);
        header("Location: /");
    }
    catch(Exception $e){
        echo $e->getMessage(); exit;
    }
}
if($_REQUEST["method_name"] == "client_delete"){

    $O = new \classes\Client($user);

    try{
        $res = $O->delete($_REQUEST);
        header("Location: /");
    }
    catch(Exception $e){
        echo $e->getMessage(); exit;
    }
}

