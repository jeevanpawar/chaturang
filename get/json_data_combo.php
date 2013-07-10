<?php
	require_once 'connect.php';
	
	$sql = mysql_query("select h_name from hotel");
	if(mysql_num_rows($sql))
	{
		$data = array(); $index = 0;
		while($recset = mysql_fetch_array($sql))
		{
			$data[$index] = $recset;
			$index++;
		}
		echo json_encode($data);
	}
?>