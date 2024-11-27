<?php

function clearStr($data): string
{
    global $link;
    $data = trim(strip_tags($data));
    return mysqli_real_escape_string($link, $data);
}

function clearInt($data): int
{
      return abs((int)$data);
}

function addItemToCatalog($title, $author, $pubyear, $price)
{
    global $link;
    $sql = "INSERT INTO catalog (title, author, pubyear, price) 
VALUES (?, ?, ?, ?)";


    if (!$stmt = mysqli_prepare($link, $sql))
        return false;
    mysqli_stmt_bind_param($stmt, "ssii",
        $title, $author, $pubyear, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
        return true;
}

function selectAllItems()
{
    global $link;
    $sql = 'SELECT id, title, author, pubyear, price
             FROM catalog';
    if(!$result = mysqli_query($link, $sql))
         return false;
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
         return $items;
}

function saveBasket()
{
    global $basket;
    $basket = base64_encode(serialize($basket));
    setcookie("basket", $basket, 0x7FFFFFFF);
}

function basketInit()
{
    global $basket, $count;
    if(!isset($_COOKIE["basket"]))
    {
        $basket = ['orderid'=>uniqid()];
        saveBasket();
    }else{
        $basket = unserialize(base64_decode($_COOKIE
        ["basket"]));
        $count = count($basket) - 1;
    }

}

function removeBasket()
{
setcookie("basket", "deleted", time() - 3600);
}

function add2Basket($id)
{
    global $basket;
    $basket[$id] = 1;
     saveBasket();
}

function myBasket()
{
    global $basket, $link;
    $goods = array_keys($basket);
    array_shift($goods);
    if(!$goods) return false;
    $ids = implode(",", $goods);
    $sql = "SELECT id, title, author, pubyear, price 
    FROM catalog WHERE id IN ($ids)";
    if(!$result = mysqli_query($link, $sql))
        return false;
    }

function result2Array($data)
{
    global $basket;
    $arr = [];
    while ($row = mysqli_fetch_array($data,
        MYSQLI_ASSOC))
    {
        $row ['quantity'] = $basket[$row['id']];
        $arr[] = $row;
    }
    return $arr;
}

function deleteItemFromBasket($id)
{
    global $basket;
    unset($basket[$id]);
    saveBasket();

}

function saveOrder($datetime)
{
    global $link, $basket;
    $goods = myBasket();
    $stmt = mysqli_stmt_init($link);
    $sql = 'INSERT INTO orders(
                   title, author, 
                   pubyear, price, 
                   quantity, orderid,
                   datetime)
            VALUES (?, ?, ?, ?, ?, ?, ?)';
    if(!mysqli_stmt_prepare($stmt, $sql))
        return false;
    foreach($goods as $item)
    {
        mysqli_stmt_bind_param($stmt,
            "ssiiisi",
            $item['title'],
            $item['author'],
            $item['pubyear'],
            $item['price'],
            $item['quantity'],
        $basket['orderid'],
        $datetime);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    removeBasket();
    return true;
}

function getOrder()
{
    global $link;
    if (!is_file(ORDERS_LOG))
        return false;
$orders = file(ORDERS_LOG);
$allorders = [];
foreach($orders as $order)
{
    list($name, $email, $phone, $address,
        $orderid, $date) = explode("|", $order);
    $orderinfo = [];
    $orderinfo['name'] = $name;
    $orderinfo['email'] = $email;
    $orderinfo['phone'] = $phone;
    $orderinfo['address'] = $address;
    $orderinfo['orderid'] = $orderid;
    $orderinfo['date'] = $date;

    $sql = "SELECT title, author, pubyear, price, quantity 
            FROM orders WHERE orderid = '$orderid' 
            AND datetime = $date";
    if(!$result = mysqli_query($link, $sql))
        return false;
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    $orderinfo["goods"] = $items;
    $allorders[] = $orderinfo;
}
   return $allorders;
}


