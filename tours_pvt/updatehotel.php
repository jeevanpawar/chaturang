<?php
session_start();
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
error_reporting(0);
include("../include/database.php");
?>
<?php
if(isset($_REQUEST['uid']))
{
	$uphotel=$_REQUEST['uid'];
	$updatehotel_qry="select * from hotel where h_id=".$uphotel;
	$updatehotel_res=mysql_query($updatehotel_qry);
	$update_hotel=mysql_fetch_array($updatehotel_res);
}

?>
<?php
	if(isset($_REQUEST['update']))
	{
		$updhotel=$_REQUEST['uid'];
		$t1=$_POST['h_date'];
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
		
	$up_qry="update hotel SET h_date='".$t1."', h_name='".$t2."', h_address='".$t3."', h_reg='".$t4."' ,h_pname='".$t5."', h_mob='".$t6."', h_ph='".$t7."', h_email='".$t8."', h_pin='".$t9."', h_bank='".$t10."', h_ac='".$t11."' where h_id='$updhotel'";
	
	$up_res=mysql_query($up_qry);
	
	if($up_res)
	{
		header("location:hotel.php");
	}
	else
	{
		echo "error";
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
<link rel="stylesheet" type="text/css" href="../css/style.css" />

</head>

<body>
<div id="container">
	<div id="sub-header">
    <?php
	include("include/p_header.php");
	?>
    	<br />
		<div class="quotation"><center>Update Hotels Details</center></div>
        <div>
        <form action="" method="post">
  		      	<table class="tab_1" align="center">
                <tr><td class="l_form">Date:</td><td><input class="q_in" id="datefield" type="text" name="h_date" value="<?php  echo $update_hotel[1]; ?>"/></td></tr>
                <tr><td class="l_form">Hotel Name:</td><td><input class="q_in" type="text" name="h_name" value="<?php  echo $update_hotel[2]; ?>" /></td></tr>
 	            <tr><td class="l_form">Address:</td><td><textarea class="q_add" name="h_address"><?php  echo $update_hotel[3]; ?></textarea></td></tr>
                <tr><td class="l_form">Registration No:</td><td><input class="q_in" type="text" name="h_reg" value="<?php  echo $update_hotel[4]; ?>"/></td></tr>
                <tr><td class="l_form">Bank Name:</td><td><input class="q_in" type="text" name="b_name" value="<?php  echo $update_hotel[10]; ?>"/></td></tr>
                </table>
                
                
                <table class="tab_2" align="center">
                <tr><td class="l_form">Concern Person:</td><td><input class="q_in" type="text" name="h_pname" value="<?php  echo $update_hotel[5]; ?>" /></td></tr>
                <tr><td class="l_form">Mobile No:</td><td><input class="q_in" type="text" name="h_mob" value="<?php  echo $update_hotel[6]; ?>" ></td></tr>
                <tr><td class="l_form">Phone No:</td><td><input class="q_in" type="text" name="h_ph" value="<?php  echo $update_hotel[7]; ?>"/></td></tr>
 	             <tr><td class="l_form">E-Mail:</td><td><input class="q_in" type="text" name="h_email" value="<?php  echo $update_hotel[8]; ?>"/></td></tr>              		
                 <tr><td class="l_form">Pin Code:</td><td><input class="q_in" type="text" name="h_pin" value="<?php  echo $update_hotel[9]; ?>"/></td></tr>
                 <tr><td class="l_form">Bank Account No:</td><td><input class="q_in" type="text" name="b_ac" value="<?php  echo $update_hotel[11]; ?>"/></td></tr>
                </table>
                
        <div class="add_h">
         <input name="update" class="formbutton" value=" Update " type="submit" />
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
