<?php 
include("../include/database.php");
  $result = mysql_query("SELECT * FROM hotel");
  
	$array = mysql_fetch_row($result);

  echo json_encode($array);
?>
