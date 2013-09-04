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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Chaturang</title>
<link rel="stylesheet" href="logincss/reset.css">
<link rel="stylesheet" href="logincss/animate.css">
<link rel="stylesheet" href="logincss/styles.css">
</head>
<body>
<div id="comp">
<div class="logo">Chaturang Group of Companies</div>
</div>
<form action="" method="post">
<div id="container2">
<div class="user">
<?php
	echo "Welcome:$a";
?>
</div>
<br>
<div>
<label id="select">Select Company</label>
</div>
<br>
<div class="cname">
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
<div class="log">
<input class="logcom" name="go" type="submit" value="Go" /></div>
</div>
</form>
</div>
<div class="reference">Copyright @ 2013 Chaturang Group of Companies Powered By: Wave TechLine India Pvt. Ltd.</div>
</body>
</html>
