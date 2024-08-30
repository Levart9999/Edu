<?php
$link = mysqli_connect('localhost', 'root', '', 'test');
if (!$link) {
    echo "Error: Unable to connect to MySQL." ;
}

$sql = "SELECT * FROM";
$result = mysqli_query($link, $sql);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
print_r($row);

