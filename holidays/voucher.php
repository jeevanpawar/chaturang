<?php
session_start();
error_reporting(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];

include("../include/database.php");
$id=$_REQUEST['id'];
$id2=$_REQUEST['id2'];
$c_query="select * from hotel_acomodation where h_id='$id2' and b_id='$id'";
$c_res=mysql_query($c_query);
$c_row=mysql_fetch_array($c_res);

?>

<?php

if(isset($_REQUEST['submit']))
{	
	$t2=$_REQUEST['i_name'];
	$t3=$_REQUEST['i_address'];
	$t4=$_REQUEST['i_word'];
	$t5=$_REQUEST['i_advance'];
	$t6=$_REQUEST['i_tax'];
	$qry="insert into invoice(c_id,i_name,i_address,i_word,i_advance,i_tax) values('".$c."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."')";
	$res=mysql_query($qry);
	
	
	if($res)
	{
		header("location:invoicedetails.php");
	}
	else
	{
		echo"error";
	}
	
}
if(isset($_REQUEST['cancel']))
{
	header("location:invoicedetails.php");
}
$qry_i="select * from invoice";
$res_i=mysql_query($qry_i);
$count=mysql_num_rows($res_i);
$i_no=$count+1;

?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />

</head>

<body>
<div id="container">
	
    
    <div id="sub-header">
    			
                <div class="quo">
                               
                <form name="form5" action="" method="post" enctype="multipart/form-data">
                <br />
                <div class="quotationI"><center>Hotel Confirmation Form</center></div>
                <br />
                <table class="voucher">
                <tr><td class="l_form">Date:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                <tr>
                <td class="l_form">Hotel Address:</td><td><textarea class="i_add" name="i_address"><?php echo $c_row[4]; ?></textarea></td></tr>
                <tr><td class="l_form">Provide the Following Service:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                <tr>
                <tr><td class="l_form">C_In</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo $c_row[2]; ?>">
				</td>
                </tr>
                <tr>
                <tr><td class="l_form">C_Out</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo $c_row[2]; ?>">
				</td>
                </tr>
                <tr><td class="l_form">Service to be Provided</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                <tr><td class="l_form">Reservation Confirmation By:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                
                <tr><td class="l_form">Confirmed by:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                <tr><td class="l_form">Travel Details</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                <tr><td class="l_form">Billing Instructions:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                <tr><td class="l_form">Remarks:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                </table>
                
                <div class="invoice_b">
            	<input name="submit" class="formbutton" value=" Submit " type="submit" onClick="javascript:return validateMyForm();" />
                <input name="cancel" class="formbutton" value="Cancel" type="submit" />
                </div>
                
                </form>
  				</div>
                
                </div>
                
        
    
    	<div class="clear"></div>
    
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
