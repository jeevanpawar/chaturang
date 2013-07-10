<?php
	require_once 'connect.php';
		$sql = mysql_query("select h_name from hotel");
		if(mysql_num_rows($sql))
		{
			$data = mysql_fetch_array($sql);
			echo json_encode($data);
		}
	
?>