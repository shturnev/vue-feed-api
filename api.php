<?php
require_once "back/vendor/autoload.php";

if($_REQUEST["method_name"] == "confirm_email" && $_REQUEST["code"]){
    $O = new \classes\User();

    try{
       $res = $O->confirm_email($_REQUEST["code"]);
       setcookie("token", $res['token'], strtotime("+1 year"));
       header("Location: /");
    }
    catch(Exception $e){
        echo $e->getMessage(); exit;
    }
}