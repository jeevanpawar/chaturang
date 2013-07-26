<?php
session_start(0);
$a=$_SESSION['user'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
error_reporting(0);
include("../include/database.php");

if(isset($_REQUEST['id']))
{
	session_destroy();
	header("location:index.php");
}
?>
<?php
	
	$t5=$_POST['h_name'];	
	$dup="select * from hotel";
	$dup_res=mysql_query($dup);
	$row=mysql_fetch_array($dup_res);
	
	if(isset($_REQUEST['add']))
	{
		$date=$_POST['h_date'];
		$t1=date('Y-m-d', strtotime($date));
		$t2=$_POST['h_name'];	
		$t3=$_POST['h_address'];
		$t4=$_POST['h_reg'];
		$t5=$_POST['h_pname'];
		$t6=$_POST['h_mob'];
		$t7=$_POST['h_ph'];
		$t8=$_POST['h_email'];
		$t9=$_POST['h_pin'];
		$t10=$_POST['b_name'];
		$t11=$_POST['b_ac'];
		$c_qry="insert into hotel(h_date,h_name,h_address,h_reg,h_pname,h_mob,h_ph,h_email,h_pin,h_bank,h_ac) values('".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."','".$t7."','".$t8."','".$t9."','".$t10."','".$t11."')";
		$c_res=mysql_query($c_qry);
		if($c_res)
		{
			header("location:hotel.php");
		}
	
		}
	if(isset($_REQUEST['can']))
	{
		header("location:home.php");
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt Ltd</title>

<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />

</head>

<body>
<div id="container">
<div id="sub-header">	
    <?php 
		include("include/p_header.php");
	?>
    
    
    <div class="quo">
    	<br />
		<div class="quotation"><center>Add New Hotels Details</center></div>
        <div>
        <form action="" method="post">
  		      	<table class="tab_1" align="center">
                <tr><td class="l_form">Date:</td><td><input class="q_in" id="datefield" type="text" name="h_date" value="<?php  echo date("d-m-Y"); ?>"/></td></tr>
                <tr><td class="l_form">Hotel Name:</td><td><input class="q_in" type="text" name="h_name" /></td></tr>
 	            <tr><td class="l_form">Address:</td><td><textarea class="q_add" name="h_address"></textarea></td></tr>
                <tr><td class="l_form">Registration No:</td><td><input class="q_in" type="text" name="h_reg"/></td></tr>
                <tr><td class="l_form">Bank Name:</td><td><input class="q_in" type="text" name="b_name"/></td></tr>
                </table>
                
                
                <table class="tab_2" align="center">
                <tr><td class="l_form">Concern Person:</td><td><input class="q_in" type="text" name="h_pname" /></td></tr>
                <tr><td class="l_form">Mobile No:</td><td><input class="q_in" type="text" name="h_mob" ></td></tr>
                <tr><td class="l_form">Phone No:</td><td><input class="q_in" type="text" name="h_ph"/></td></tr>
 	             <tr><td class="l_form">E-Mail:</td><td><input class="q_in" type="text" name="h_email"/></td></tr>              		<tr><td class="l_form">Pin Code:</td><td><input class="q_in" type="text" name="h_pin"/></td></tr>
                 <tr><td class="l_form">Bank Account No:</td><td><input class="q_in" type="text" name="b_ac"/></td></tr>
     
                </table>
                
        <div class="add_h">
         <input name="add" class="formbutton" value=" Add " type="submit" />
         <input name="can" class="formbutton" value="Cancel" type="submit" />
        </div>
        
        </form>
    </div>
    </div>
        
    
    	<div class="clear"></div>
    </div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
