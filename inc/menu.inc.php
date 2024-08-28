<?php	

$leftMenu = [
	['link'=>'Home','href'=>'index.php'],	
	['link'=>'Multiplication table','href'=>'inc/table.php'],
	['link'=>'Calculator','href'=>'inc/calc.php']
	]; 

if(!drawMenu($leftMenu))
    trigger_error("fuck", E_USER_ERRROR);


?>