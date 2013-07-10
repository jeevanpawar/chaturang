<?php
	$HOST = "localhost";
	$USER = "root";
	$PASS = "";
	$DATABASE = "chaturang";
	$con = mysql_connect($HOST, $USER, $PASS);
	$db = mysql_select_db($DATABASE, $con);
?>