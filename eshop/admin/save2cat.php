<?php
require "secure/session.inc.php";
require "../inc/config.inc.php";
require "../inc/lib.inc.php";


$title = clearStr($_POST["title"]);
$author = clearStr($_POST["author"]);
$pubyear = clearInt($_POST["pubyear"]);
$price = clearInt($_POST["price"]);

if(!addItemToCatalog($title, $author, $pubyear, $price))
{
    echo "Error before save item to catalog";
}else{
    header("Location: save2cat.php");
    exit;
}

