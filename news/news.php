<?php
include "NewsDB.class.php";

try {
    $newsDB = new NewsDB();
}catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>

<html>
<head>
    <title>Новостная лента</title>
    <meta charset="utf-8" />
</head>
<body>

<h1>Последние новости</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    Заголовок новости:<br />
    <input type="text" name="title" /><br />
    Выберите категорию:<br />
    <select name="category">
        <option value="1">Политика</option>
        <option value="2">Культура</option>
        <option value="3">Спорт</option>
    </select>
    <br />
    Текст новости:<br />
    <textarea name="description" cols="50" rows="5"></textarea><br />
    Источник:<br />
    <input type="text" name="source" /><br />
    <br />
    <input type="submit" value="Добавить!" />

</form>
</body>
</html>