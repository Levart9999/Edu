<?php

session_start();
header("HTTP/1.1 401 Unauthorized ");
require_once("secure.inc.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = trim(strip_tags($_POST["login"]));
    $pw = trim(strip_tags($_POST["pw"]));
    $ref = trim(strip_tags($_GET["ref"]));
if(!$ref)
    $ref = '/eshop/admin/';
if(!$login and !$pw){
    if($result = userExists($login)){
        list($_,$hash) = explode(':',$result);
        if(checkHash($hash,$pw)){
            $_SESSION['admin'] = true;
            header("Location: $ref");
            exit;
        }else {
            $title = "Invalid name or password";
          }
        }else{
        $title = "Invalid name or password";
       }
    }else{
    $title = "fill in all fields of the form";
  }
}

