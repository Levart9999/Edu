

<?php

include "lib.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$cols = abs((int) $_POST['cols']);
	$rows = abs((int) $_POST['rows']);
	$color = trim(strip_tags($_POST['color']));
}
?>
<!DOCTYPE html>
<html>
<header>
<title>Multiplication table</title>
</header>
<body>
<div id="content">
<h1>Multiplication table</h1>
<form action="<?= $_SERVER['REQUEST_URI']?>"  method="post">
   <label>Quantity cols:</label>
   <br />
   <input name="cols" type="text" value="" />
   <br />
   <label>Quantity rows:</label>
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