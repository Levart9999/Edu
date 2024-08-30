<?php

const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASSWORD = "ion11";
const DB_NAME = "gbook";

$link = mysqli_connect(DB_HOST, DB_USER,
                    DB_PASSWORD, DB_NAME)
or die(mysqli_connect_error());

function clearStr($data): string
{
    global $link;
    $data = trim(strip_tags($data));
    return mysqli_real_escape_string($link, $data);
}
//    Сохранение записей в базу данных
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = clearStr($_POST["name"]);
    $email = clearStr($_POST["email"]);
    $msg = clearStr($_POST["msg"]);
    $sql = sprintf("INSERT INTO msgs (name, email, msg) 
                      VALUES (%s, %s, %s)", $name, $email, $msg);
    mysqli_query($link, $sql);
    header("Location:" . $_SERVER["REQUEST_URI"]);
    exit;
}

//     Вывод записей из БД

$sql = "SELECT id, name, email, msg, 
                UNIX_TIMESTAMP(datetime) as dt
          FROM msgs ORDER BY id DESC";
$res = mysqli_query($link, $sql);
echo "<p>Всего записей в гостевой книге: " .
    mysqli_num_rows($res);
while($row = mysqli_fetch_assoc($res)){
    $dt = date("d.m.Y H:i", $row["dt"]);
    $msg = nl2br($row["msg"]);
    echo <<<MSG

MSG;

}

//Удаление записи
if(isset($_GET["delete"])){
    $id  = abs((int)$_GET["delete"]);
    if($id){
        $sql = "DELETE FROM msgs WHERE id=$id";
        mysqli_query($link, $sql);

    }
}