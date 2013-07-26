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
<title>Chaturang</title>

<link href="login-box.css" rel="stylesheet" type="text/css" />
<style type="text/css">

.reference {
	
	position:fixed;
	width:100%;
	left:-1px;
	right:-1px;
	text-align:center;
	height:20px;
	opacity:0.5;
	color:#FFF;
	background-color:#000;
	letter-spacing:1px;
	padding-left:5px;
	bottom:0px;
}
</style>
</head>

<body>


<div style="padding: 130px 0 0 0;" align="center">

<form action="" method="post">
<div id="login-box">

<H2 align="left"><span class="main">CHATURANG</span><br /><span class="tour">Group of Companies</span></H2>

<div class="all">
<div id="login-box-name" style="margin-top:20px;">User:</div><div id="login-box-field" style="margin-top:20px;"><input name="username" class="form-login" title="Username" placeholder="Enter User Name" size="30" maxlength="2048" /></div>
<div id="login-box-name">Password:</div><div id="login-box-field"><input name="password" type="password" class="form-login" title="Password" placeholder="Enter Password" size="30" maxlength="2048" /></div>
<br />
<span class="login-box-options"><input type="checkbox" name="1" value="1"> Remember Me <a href="#" style="margin-left:30px;">Forgot password?</a></span>
<br />
<br />
<div><input  class="log" type="submit" value="Login" name="login" /></div>
</form>
</div>

</div>



<div class="reference">Copyright @ 2013 Chaturang Tours Pvt. Ltd. Powered By: Wave TechLine India Pvt. Ltd.</div>

</body>
</html>
