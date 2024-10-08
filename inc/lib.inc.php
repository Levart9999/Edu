<?php
function myError($no, $msg, $file, $line){
     if($no == E_USER_ERROR){
	 echo "fuck";
	 $s = date("d-m-Y H:i:s") . " - $msg в $file:$line";
	 error_log("$s\n", 3, "error.log");
	 }
}
 


function drawMenu($menu, $vertical=true){
	if(!is_array($menu))
		return  false;
	$style = "";
	if(!$vertical)
		$style = 'style= display:list-item';
	echo "<menu>";
foreach($menu as $item){
	echo "<ol $style >";
	echo "<a href='$item[href]'>{$item['link']}</a>";
	echo "</ol >";
}
echo "</menu>";


return true;
}



function drawTable($cols=10, $rows=10, $color="yellow"){
	echo "<table border='1'>";
for($tr=1; $tr<=$rows; $tr++){
	echo "<tr>";
	for ($td=1; $td<=$cols; $td++){
		if($td==1 or $tr==1)
		  echo "<th style='background:$color'>" .$td * $tr. "</th>";
	    else
		  echo "<td>" .$td * $tr. "</td>";
	}
	echo "</tr>";
}
echo "</table>";
	
}



