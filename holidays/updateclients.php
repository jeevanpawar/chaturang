<?php
session_start();
error_reporting(0);	
$a=$_SESSION['user'];
$c=$_SESSION['com'];

	include("../include/database.php");
	$c_up=$_REQUEST['c_id2'];
	$c_qry_f="select * from clients where c_id=".$c_up;
	$c_res_f=mysql_query($c_qry_f);
	$c_row=mysql_fetch_array($c_res_f);
?>
<?php
	if(isset($_REQUEST['can']))
	{
		header("location:clients.php");
	}
?>
<?php
	
	if(isset($_REQUEST['c_up']))
	{	
		$c=$_REQUEST['c_id2'];
		$t1=$_POST['c_first'];
		$t2=$_POST['c_last'];
		$t3=$_POST['c_add'];
		$t4=$_POST['c_city'];
		$t5=$_POST['c_pin'];
		$t6=$_POST['c_email'];
		$t7=$_POST['c_ph'];
		$t8=$_POST['c_mo'];
		$t9=$_POST['c_date'];
		
		$qry_up="update clients SET c_date='".$t9."', c_first='".$t1."', c_last='".$t2."', c_add='".$t3."', c_city='".$t4."', c_pin='".$t5."', c_ph='".$t6."', c_mo='".$t7."', c_email='".$t8."' where c_id=".$c;
		$res_up=mysql_query($qry_up);
		if($res_up)
		{
			header("location:clients.php");
		}
		else
		{
			echo "error";
		}
	}

?>
<html>
<head>
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
    
   
   
    	<br />
		<div class="quotation"><center>Update Client Details</center></div>
        <div>
        <form action="" method="post">
        		<table class="q_clients">
                <tr><td class="l_form">First Name:</td><td><input class="q_in" type="text" name="c_first" value="<?php echo $c_row[2]; ?>" /></td></tr>
                <tr><td class="l_form">Last Name:</td><td><input class="q_in" type="text" name="c_last" value="<?php echo $c_row[3]; ?>"/></td></tr>
                <tr><td class="l_form">Address:</td><td><textarea class="q_add" name="c_add"><?php echo $c_row[4]; ?></textarea></td></tr>
                <tr><td class="l_form">City:</td><td><input class="q_in" type="text" name="c_city" value="<?php echo $c_row[5]; ?>"/></td></tr>
                <tr><td class="l_form">Pin Code:</td><td><input class="q_in" type="text" name="c_pin" value="<?php echo $c_row[7]; ?>" /></td></tr>
                              </table>
                <table class="q_clients2">
                <tr><td class="l_form">Email Id:</td><td><input class="q_in" type="text" name="c_email" value="<?php echo $c_row[9]; ?>"/></td></tr>
                <tr><td class="l_form">Phone No:</td><td><input class="q_in" type="text" name="c_ph" value="<?php echo $c_row[8]; ?>"/></td></tr>
                <tr><td class="l_form">Mobile No:</td><td><input class="q_in" type="text" name="c_mo" value="<?php echo $c_row[9]; ?>" /></td></tr>
                <tr><td class="l_form">Date:</td><td><input class="q_in" type="text" name="c_date" value="<?php  echo date("d-m-Y"); ?>"/></td></tr>
                </table>
        <div class="update">
         <input name="c_up" class="formbutton" value=" Update " type="submit" />
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
