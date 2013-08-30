<?php
session_start();
include("include/database.php");
$a=$_SESSION['user'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:index.php");
	}
?>
<?php
$qry="select * from company";
$res=mysql_query($qry);
if(isset($_REQUEST['go']))
{
	$b=$_POST['t1'];
	$_SESSION['com']=$b;
	if($b == '1')
	{
		header("location:tours_pvt/home.php");
	}
	else if($b == '2')
	{
		header("location:tours_pvt/home.php");
	}
	else if($b == '3')
	{
		header("location:holidays/home.php");
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
	font-size:14px;
	text-align:center;
	height:20px;
	opacity:1;
	color:#000;
	display: inline-block;
  *display: inline;
  padding: 2px 2px 2px;
  margin-bottom: 0;
  font-size: 12px;
  
  text-align: center;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  vertical-align: middle;
  cursor: pointer;
  background-color: #f5f5f5;
  *background-color: #e6e6e6;
  background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
  background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
  background-repeat: repeat-x;
  border: 1px solid #cccccc;
  *border: 0;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  border-color: #e6e6e6 #e6e6e6 #bfbfbf;
  border-bottom-color: #b3b3b3;
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
	bottom:0px;
}
</style>
</head>
<body class="fade-in">
<div style="padding: 130px 0 0 0;" align="center">
<form action="" method="post">
<div id="login-box">
<H2 align="left"><span class="main">CHATURANG</span><br /><span class="tour">Group of Companies</span></H2>
<div class="welcome">
<?php
	echo "Welcome:$a";
?>
</div>
<br /><br />
<div id="login-box-field" style="margin-top:20px;"><label id="select">Select Company</label></div>
<div id="login-box-field-select">
<select name="t1">
<?php
while($row=mysql_fetch_array($res))
{
	echo "<option value='$row[0]'>";
	echo $row[1];
	echo "</option>";
}
?>
</select>
</div>
<br />
<span class="login-box-options"></span>
<br /><br />
<div><input class="logcom" name="go" type="submit" value="Go" /></div>
</form>
</div>
</div>
<div class="reference">Copyright @ 2013 Chaturang Tours Pvt. Ltd. Powered By: Wave TechLine India Pvt. Ltd.</div>
</body>
</html>
