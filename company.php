<?php
session_start();
include("include/database.php");
$a=$_SESSION['user'];
?>

<?php

$qry="select * from company";
$res=mysql_query($qry);

if(isset($_REQUEST['go']))
{
	$b=$_POST['t1'];
	
	$_SESSION['com']=$b;
	
	if($b==1)
	{
		header("location:tours/home.php");
	}
	else if($b==2)
	{
		header("location:tours_pvt/home.php");
	}
	else if($b==3)
	{
		header("location:holidays/holiday.php");
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
<div class="welcome">
<?php
echo "Welcome:$a";
?>
</div>
<br />
<br />

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
<br />
<br />
<div  ><input class="logcom" name="go" type="submit" value="Go" /></div>



</form>


</div>

</div>
<div class="reference">Copyright @ 2013 Chaturang Tours Pvt. Ltd. Powered By: Wave TechLine India Pvt. Ltd.</div>

</body>
</html>
