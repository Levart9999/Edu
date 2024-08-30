<?php

global $basket;
require "inc/lib.inc.php";
require "inc/config.inc.php";

$name = clearStr($_POST["name"]);
$email = clearStr($_POST["email"]);
$phone = clearStr($_POST["phone"]);
$address = clearStr($_POST["address"]);
$oid = $basket["orderid"];
$dt = time();
$order = "$name|$email|$phone|$address|$oid|$dt";
file_put_contents("admin/" . ORDERS_LOG, $order,
FILE_APPEND);
saveOrder($dt);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Save the order</title>
</head>
<body>
<p>Your order is changed</p>
<p><a href="catalog.php">Back to catalog</a> </p>
</body>
</html>

