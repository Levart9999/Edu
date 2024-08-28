<?php
 


?>

<?php
include "lib.inc.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$cols = abs((int) $_POST['cols']);
	$rows = abs((int) $_POST['rows']);
	$color = trim(strip_tags($_POST['color']));
}	

//$cols = ($cols) ? $cols : 10;
//$rows = ($rows) ? $rows : 10;
//$color = ($color) ? $color : 'yellow';
?>
<!DOCTYPE html>
<html>
<header>
<title>Таблица умножения</title>
</header>
<body>
<div id="content">
<h1>ТАБЛИЦА УМНОЖЕНИЯ</h1>
<form action="<?= $_SERVER['REQUEST_URI']?>"  method="post">
   <label>Количество колонок:</label>
   <br />
   <input name="cols" type="text" value="" />
   <br />
   <label>Количество строк:</label>
   <br />
   <input name="rows" type="text" value="" />
   <br />
   <br />
   <input type="submit" value="Создать" />
</form>
   
<?php
drawTable();
?>
</div>

</body>
</html>