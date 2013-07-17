<?php
session_start();
$a=$_SESSION['user'];
$c=$_SESSION['com'];
error_reporting(0);

include("../include/database.php");
$id=$_REQUEST['id'];
$qry="select * from reciept where p_id='$id'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);
echo $row[3];
$qry_d="select * from partial_payment where p_id=".$id;
$res_d=mysql_query($qry_d);
$row_d=mysql_fetch_array($res_d);

$qry_name="select * from booking_form where b_id='$row[3]'";
$res_name=mysql_query($qry_name);
$row_name=mysql_fetch_array($res_name);

	if(isset($_REQUEST['e_can']))
	{
		header("location:payment.php");
	}
	
	$d=date('d-m-Y');
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
        <div>
        <br />
        <table class="viewreciept">
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>No:</td>
        <td><?php echo $row[0]; ?></td>
        </tr>
        <tr>
        <td width="300">&nbsp;&nbsp;&nbsp;Chaturang Tours Pvt Ltd</td>
        <td width="450"></td>
        <td></td>
        <td width="50">Date:</td>
        <td width="50">&nbsp;&nbsp;<?php echo $row[4]; ?></td>
        </tr>
        <tr>
        <td colspan="5" class="high"><center>Reciept</center></td>
        </tr>
        <tr></tr>
        <tr>
        <td colspan="5">&nbsp;&nbsp;&nbsp;Received with thanks from Mr. Mrs./Ms.&nbsp;&nbsp;<u><?php echo $row_name[3]; ?></u></td>
        </tr>
        <tr>
        <td colspan="5">&nbsp;&nbsp;&nbsp;Sum Of Rupees:&nbsp;&nbsp;<u><?php echo $row[8]; ?></u></td>
        </tr>
        <tr>
        <td colspan="4">&nbsp;&nbsp;&nbsp;By /Cheque/D.D. No.:&nbsp;&nbsp;<u><?php echo $row[6]; ?></u></td><td>Dated</td>
        </tr>
        <tr>
        <td colspan="5">&nbsp;&nbsp;&nbsp;of</td>
        </tr>
        <tr>
        <td colspan="4">&nbsp;&nbsp;&nbsp;in Full/Part Payment against</td><td>Booking Ref. No.:&nbsp;&nbsp;<u><?php echo $row[3]; ?></u></td>
        </tr>
        <tr>
        </tr>
		<tr>
        </tr>
        <tr>
        <td width="200" class="rs">&nbsp;&nbsp;&nbsp;Rs:<?php echo $row[7].'/-'; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td width="450" align="center">For Chaturang Tours Pvt. Ltd.</td>
        </tr>
        <tr></tr>
        <tr>
        <td></td>
        <td colspan="5" class="print1"><a href="">Print</a></td>
        </tr>
        </table>
        
        
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
