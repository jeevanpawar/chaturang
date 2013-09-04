<?php
session_start();
unset($_SESSION['user']);
error_reporting(0);

	include("include/database.php");
	if(isset($_REQUEST['login']))
	{
		$sql="select * from user where u_name = '". $_POST['username'] ."' and u_password = '".$_POST['password']."'";
		$result = mysql_query($sql);
		if($row = mysql_fetch_array($result))
		  {
			 $_SESSION['user']=$row[1];
			 session_is_registered();

			 header("Location:company.php");
		  }
		else
		{
			header("location:index.php");
		}
	}
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Chaturang</title>
<link rel="stylesheet" href="logincss/reset.css">
<link rel="stylesheet" href="logincss/animate.css">
<link rel="stylesheet" href="logincss/styles.css">
</head>
<body>
	<!-- Begin Page Content -->
	<div id="comp">
    <div class="logo">Chaturang Group of Companies</div>
    </div>

	<div id="container">
		<form action="" method="post">
		
		<label for="name">Username:</label>
		
		<input type="name" name="username">
		
		<label for="username">Password:</label>
		
		
		<input type="password" name="password">
		
		<div id="lower">
		
		<input type="checkbox"><label class="check" for="checkbox">Keep me logged in</label>
		
		<input type="submit" value="Login" name="login">
		
		</div>
		
		</form>
		
	</div>
	
<div class="reference">Copyright @ 2013 Chaturang Group of Companies. Powered By: Wave TechLine India Pvt. Ltd.</div>
	
	<!-- End Page Content -->
	
</body>
</html>
