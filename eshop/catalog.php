<?php

global $count, $goods;
require "inc/config.inc.php";
include "inc/lib.inc.php";

$goods = selectAllItems();

if ($goods === false)
{
    echo "ERROR";
    exit;
}

if (!is_array($goods) || count($goods) === 0)
{
    echo "EMPTY";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Каталог товаров</title>
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>: <?=
    $count?></p>
<table border="1" cellpadding="5" cellspacing="0"
width="100%">
<tr>
    <th>Title</th>
    <th>Author</th>
    <th>Year</th>
    <th>Price</th>
    <th>In Basket!</th>
</tr>

<?php foreach ($goods as $item) { ?>

    <tr>
        <td><?= $item['title']?></td>
        <td><?= $item['author']?></td>
        <td><?= $item['pubyear']?></td>
        <td><?= $item['price']?></td>
        <td><a href="add2basket.php?id=
            <?= $item['id']?>"
            >In Basket!</a></td>
    </tr>
  <?php
    }
?>


</table>
</body>
</html>
