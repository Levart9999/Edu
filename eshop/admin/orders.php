<?php

require "secure/session.inc.php";
require "../inc/lib.inc.php";
require "../inc/config.inc.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders to sell</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Orders on buy:</h1>
<?php
$orders = getOrder();
//var_dump($orders);
if(!$orders) {
   echo "No orders found";
   exit;
}
foreach($orders as $order) :
?>
<hr>
<h2>№ order:<?=$order["orderid"]?></h2>
<p><b>Customer</b>:<?=$order["name"]?></p>
<p><b>Email</b>:<?=$order["email"]?></p>
<p><b>Phone</b>:<?=$order["phone"]?></p>
<p><b>Delivery address</b>:<?=$order["address"]?></p>
<p><b>Date of order</b>:<?=$order["datetime"]?></p>

<h3>Purchased goods</h3>

<table border="1" cellpadding="5" cellspacing="0" width="90%">
<tr>
    <th>Number order</th>
    <th>Title</th>
    <th>Author</th>
    <th>Year</th>
    <th>Price</th>
    <th>Quantity</th>
</tr>
    <?php
    $i = 1;
    $sum = 0;
    foreach ($order["goods"] as $item) { ?>

        <tr>
            <td><?= $i++?></td>
            <td><?= $item['title']?></td>
            <td><?= $item['author']?></td>
            <td><?= $item['pubyear']?></td>
            <td><?= $item['price']?></td>
            <td><?= $item['quantity']?></td>

                >Delete!</a></td>
        </tr>
        <?
        $sum += $item['price'] * $item['quantity'];
    }
    ?>

</table>
<p>Total goods amount:<?=$sum?></p>
<?php
endforeach;
?>
</body>
</html>

