<?php

function mysqliConnect(){
	$mysqli = new mysqli('databases.000webhost.com', 'id6130203_eeonelix', '2267r2267r', 'id6130203_fineworld');
	$mysqli->query ("SET NAMES 'utf8'");
	return $mysqli;	
}
$mysqli= mysqliConnect();

$row = $mysqli->query("SELECT * FROM `Players`");

while($row->fetch_assoc() != false){
	$i++;
	$mysqli->query("UPDATE `users` SET `count` = `count` + 1 WHERE id = '".$i."'");
}
mysqli_close();

 
?>