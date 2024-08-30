<?php

global $count;
require "inc/lib.inc.php";
require "inc/config.inc.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Basket</title>
    <meta charset="UTF-8">
</head>
<body>
   <h1>Your basket</h1>
<?php
$goods = myBasket();
if(!$count){
    echo "Empty Basket!Back to <a href='catalog.php'>catalog</a>";
    exit;
}else{
    echo "Back to <a href='catalog.php'>catalog</a>";
}
$goods = myBasket();
?>
<table border="1" cellpadding="5" cellspacing="0"
       width="100%">
    <tr>
<th>N p/p</th>
<th>Title</th>
<th>Author</th>
<th>Year</th>
<th>Price</th>
<th>Quantity</th>
<th>Delete</th>
    </tr>
    <?php
    $i = 1;
    $sum = 0;
    foreach ($goods as $item) { ?>

        <tr>
            <td><?= $i++?></td>
            <td><?= $item['title']?></td>
            <td><?= $item['author']?></td>
            <td><?= $item['pubyear']?></td>
            <td><?= $item['price']?></td>
            <td><?= $item['quantity']?></td>
            <td><a href="delete_from_basket.php
            <?= $item['id']?>"
                >Delete!</a></td>
        </tr>
        <?
        $sum += $item['price'] * $item['quantity'];
    }
    ?>

</table>

<p>Total goods in basket for sum:<?=$sum?></p>

<div align="center">
    <input type="button" value="Place an order!"
        onclick="location.href='orderform.php'"/>
</div>
</body>
</html>
