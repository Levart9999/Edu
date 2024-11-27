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

<h1>Latest news</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    New's title:<br />
    <input type="text" name="title" /><br />
    Change the category:<br />
    <select name="category">
        <option value="1">Politics</option>
        <option value="2">Culture</option>
        <option value="3">Sport</option>
    </select>
    <br />
    Text:<br />
    <textarea name="description" cols="50" rows="5"></textarea><br />
    Source:<br />
    <input type="text" name="source" /><br />
    <br />
    <input type="submit" value="Добавить!" />

</form>
</body>
</html>