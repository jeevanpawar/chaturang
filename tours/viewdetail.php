<?php
error_reporting(0);
session_start();
$a=$_SESSION['user'];
$c=$_SESSION['com'];
include("../include/database.php");

?>
<?php
	$id=$_REQUEST['id'];
	$qry="select * from booking_form where b_id='$id' and c_id=".$c;
	$res=mysql_query($qry);
	$row=mysql_fetch_array($res);
?>
<?php
	$qry_p="select * from pass_info where b_id='$id' and c_id=".$c;
	$res_p=mysql_query($qry_p);
?>
<?php
	$qry_h="select * from hotel_acomodation where b_id='$id' and c_id=".$c;
	$res_h=mysql_query($qry_h);
?>
<?php
	$qry_v="select * from vehicle_transportation where b_id='$id' and c_id=".$c;
	$res_v=mysql_query($qry_v);
?>
<?php
	$qry_cpay="select SUM(p_amt) from partial_payment where b_id='$id' and c_id=".$c;
	$res_cpay=mysql_query($qry_cpay);
	$row_cpay=mysql_fetch_array($res_cpay);
?>
<?php
	$qry_hpay="select SUM(h_amt) from hotel_pay where b_id='$id' and c_id=".$c;
	$res_hpay=mysql_query($qry_hpay);
	$row_hpay=mysql_fetch_array($res_hpay);
?>
<?php
	$qry_tpay="select SUM(v_amt) from trans_pay where b_id='$id' and c_id=".$c;
	$res_tpay=mysql_query($qry_tpay);
	$row_tpay=mysql_fetch_array($res_tpay);
?>
<?php
    $balance=$row[8]-$row_cpay[0];
	$expense=$row_hpay[0]+$row_tpay[0];	
	$profit=$row[8]-$expense;
?>

<?php	
	if(isset($_REQUEST['can']))
	{
		header("location:home.php");
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
        <div>
		<br>
        <div class="quotation"><center>Profit/Expense Details</center></div>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="150">Booking Amount</td>
        <td width="150">Client Payment</td>
        <td width="150">Client Balance</td>
        <td>Hotel/Vendor Payment</td>
        <td>Transportation Payment</td>
        <td width="150">Total Expense</td>
        <td width="150">Total Profit</td>
       
        </tr>
        <tr class="pagi">
        <td width="150"><b><?php echo $row[8].'&nbsp;'.'Rs/-'; ?></b></td>
        <td width="150"><b><?php echo $row_cpay[0].'&nbsp;'.'Rs/-'; ?></b></td>
        <td><b><?php echo $balance.'&nbsp;'.'Rs/-'; ?></b></td>
        <td><b><?php echo $row_hpay[0].'&nbsp;'.'Rs/-'; ?></b></td>
        <td width="70"><b><?php echo $row_tpay[0].'&nbsp;'.'Rs/-'; ?></b></td>
        <td width="70"><b><?php echo $expense.'&nbsp;'.'Rs/-'; ?></b></td>
        <td width="70"><b><?php echo $profit.'&nbsp;'.'Rs/-'; ?></b></td>
        </tr>
        </table>
        <br>
        <div class="quotation"><center>Booking Information</center></div>

		<table class="emp_tab">
        <tr class="menu_header">
        <td width="150">B.No</td>
        <td width="150">B.Date</td>
        <td>SE</td>
        <td>Office</td>
        <td width="70">Pax</td>
        <td width="70">Adult</td>
        <td width="70">Child</td>
        <td width="50">Amount</td>
        </tr>
        <tr class="pagi">
        <td width="150"><?php echo $row[0]; ?></td>
        <td width="150"><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td width="70"><?php echo $row[5]; ?></td>
        <td width="70"><?php echo $row[6]; ?></td>
        <td width="70"><?php echo $row[7]; ?></td>
        <td width="50"><?php echo $row[8]; ?></td>
        </tr>
        </table>
        <br>
        
         <table class="emp_tab">
         <tr class="menu_header">
         <td>Tourists Name</td>
         <td>M/F</td>
         <td>Age</td>
         <td>DOB</td>
         <td>Contact No</td>
         <td>Email</td>
         </tr>
         <?php
         while($row_p=mysql_fetch_array($res_p))
         {
			 echo "<tr class='pagi'>";
			 echo "<td>";
			 echo $row_p[3];
			 echo "</td>";
			 echo "<td>";
			 echo $row_p[4];
			 echo "</td>";
			 echo "<td>";
			 echo $row_p[5];
			 echo "</td>";
			 echo "<td>";
			 echo $row_p[6];
			 echo "</td>";
			 echo "<td>";
			 echo $row_p[7];
			 echo "</td>";
			 echo "<td>";
			 echo $row_p[8];
			 echo "</td>";
			 echo "</tr>";
         }
		 ?>
         </table>
         <br>
             <table class="emp_tab">
         <tr class="menu_header">
        
         <td>Vendor's Name</td>
         <td>Hotel Name</td>
         <td>Place</td>
         <td>Room</td>
         <td>Meal PLN</td>
         <td>C/I</td>
         <td>C/O</td>
         </tr>
         <?php
         while($row_h=mysql_fetch_array($res_h))
         {
			 echo "<tr class='pagi'>";
			 echo "<td>";
			 echo $row_h[3];
			 echo "</td>";
			 echo "<td>";
			 echo $row_h[4];
			 echo "</td>";
			 echo "<td>";
			 echo $row_h[5];
			 echo "</td>";
			 echo "<td>";
			 echo $row_h[6];
			 echo "</td>";
			 echo "<td>";
			 echo $row_h[7];
			 echo "</td>";
			 echo "<td>";
			 echo $row_h[8];
			 echo "</td>";
			 echo "<td>";
			 echo $row_h[9];
			 echo "</td>";
			 echo "</tr>";
         }
		 ?>
         
         </table>
         <br>
         <table class="emp_tab">
         <tr class="menu_header">
         <td>Vendor's Name</td>
         <td>Vehicle Type</td>
         <td>Pick Up</td>
         <td>point</td>
         <td>Drop</td>
         <td>Point</td>
         <td>Days</td>
		 </tr>
         <?php
         while($row_v=mysql_fetch_array($res_v))
         {
			 echo "<tr class='pagi'>";
			 echo "<td>";
			 echo $row_v[3];
			 echo "</td>";
			 echo "<td>";
			 echo $row_v[4];
			 echo "</td>";
			 echo "<td>";
			 echo $row_v[5];
			 echo "</td>";
			 echo "<td>";
			 echo $row_v[6];
			 echo "</td>";
			 echo "<td>";
			 echo $row_V[7];
			 echo "</td>";
			 echo "<td>";
			 echo $row_v[8];
			 echo "</td>";
			 echo "<td>";
			 echo $row_v[9];
			 echo "</td>";
			 echo "</tr>";
         }
		 ?>
         

         </table>	 
         <div id="phone">
                
         </div>     
        <div class="addclients_b">
        <form>
         <input name="add" class="formbutton" value=" Add " type="submit" />
         <input name="can" class="formbutton" value="Cancel" type="submit" />
        </form>
        </div>
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
