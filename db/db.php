<?php
$link = mysqli_connect('localhost', 'root', 'ion11', 'test');
if (!$link) {
    echo "Error: Unable to connect to MySQL." ;
}

$sql = "SELECT * FROM teachers";
$result = mysqli_query($link, $sql);

$row = mysqli_fetch_array($result);
print_r($row);

