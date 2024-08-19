<?php
$link = mysqli_connect("localhost", "root", "ion11");
if (!$link) {
    echo "Error: Unable to connect to MySQL." ;
}
mysqli_select_db($link, "test");

mysql_close($link);

?>