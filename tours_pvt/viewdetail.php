<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");

if(isset($_REQUEST['id2']))
{
	header("location:booking.php");
}
?>

<?php
	$id=$_REQUEST['id'];
	$qry="select * from booking_form where b_id='$id' and c_id='$c'";
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
<?php
	if(isset($_REQUEST['print']))
	{
		header("location:viewpdf.php");
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
        
        <div class="headline">Booking Information</div>
        <table class="emp_tab">
        <tr class="information">
        <td width="150">B.No</td>
        <td width="150">B.Date</td>
        <td>SE</td>
        <td>Client Name</td>
        <td width="70">Pax</td>
        <td width="70">Adult</td>
        <td width="70">Child</td>
        <td width="50">Room's</td>
        </tr>
        <tr class="pagi">
        <td width="150"><?php echo $id; ?></td>
        <td width="150"><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td width="70"><?php echo $row[5]; ?></td>
        <td width="70"><?php echo $row[6]; ?></td>
        <td width="70"><?php echo $row[7]; ?></td>
        <td width="50"><?php echo $row[12]; ?></td>
        </tr>
        </table>
       
         <?php
		 
		 if(($count=mysql_num_rows($res_p))>0)
		 { 
		 echo "<br>";
		 echo "<div class='headline'>Tourists Information</div>";
         echo "<table class='emp_tab'>";
         echo "<tr class='information'>";
         echo "<td>Tourists Name</td>";
         echo "<td>M/F</td>";
         echo "<td>DOB</td>";
         echo "<td>Age</td>";
		 echo "<td>Contact No</td>";
         echo "<td>Email</td>";
         echo "</tr>";
         
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
			 echo date('d-m-Y', strtotime ($row_p[6]));
			 echo "</td>";
			 echo "<td>";
			 echo $row_p[5];
			 echo "</td>";
			 echo "<td>";
			 echo $row_p[7];
			 echo "</td>";
			 echo "<td>";
			 echo $row_p[8];
			 echo "</td>";
			 echo "</tr>";
         }
		 }
		 ?>
         </table>
         
         <?php
		
		 if(($count=mysql_num_rows($res_h))>0)
		 {
			  echo "<br>";
			  echo "<div class='headline'>Hotel Accommodation</div>";
         echo "<table class='emp_tab'>";
         echo "<tr class='information'>";
         echo "<td>Vendor's Name</td>";
         echo "<td>Hotel Name</td>";
         echo "<td>Place</td>";
         echo "<td>Room</td>";
         echo "<td>Meal PLN</td>";
         echo "<td>C/I</td>";
         echo "<td>C/O</td>";
         echo "</tr>";
         
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
			 echo date('d-m-Y', strtotime ($row_h[8]));
			 echo "</td>";
			 echo "<td>";
			 echo date('d-m-Y', strtotime ($row_h[9]));
			 echo "</td>";
			 echo "</tr>";
         }
		 }
		 ?>
         
         </table>
         
         <?php
		 if(($count=mysql_num_rows($res_v)))
		 {
		 echo "<br>";
		 echo "<div class='headline'>Vehicle Transportation</div>";
         echo "<table class='emp_tab'>";
         echo "<tr class='information'>";
         echo "<td>Vendor's Name</td>";
         echo "<td>Vehicle Type</td>";
         echo "<td>Pick Up</td>";
         echo "<td>point</td>";
         echo "<td>Drop</td>";
         echo "<td>Point</td>";
         echo "<td>Days</td>";
		 echo "</tr>";
         
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
			 echo date('d-m-Y', strtotime ($row_v[5]));
			 echo "</td>";
			 echo "<td>";
			 echo $row_v[6];
			 echo "</td>";
			 echo "<td>";
			 echo date('d-m-Y', strtotime ($row_v[7]));
			 echo "</td>";
			 echo "<td>";
			 echo $row_v[8];
			 echo "</td>";
			 echo "<td>";
			 echo $row_v[9];
			 echo "</td>";
			 echo "</tr>";
         }
		 }
		 ?>
         </table>	 
         <br>
        <div class="headline">Profit/Expense Details</div>
        <table class="emp_tab">
        <tr class="information">
        <td width="150">Package Cost</td>
        <td width="150">Client Payment</td>
        <td width="150">Client Balance</td>
        <td>Hotel/Vendor Payment</td>
        <td>Transportation Payment</td>
        <td width="150">Total Expense</td>
        <td width="150">Gross Profit</td>
       
        </tr>
        <tr class="pagi">
        <td width="150"><b><?php echo "<span style='font-family:rupee;font-size:14px'>".'R'.$row[8].'&nbsp;'; ?></b></td>
        <td width="150"><b><?php echo "<span style='font-family:rupee;font-size:14px'>".'R'.$row_cpay[0].'&nbsp;'; ?></b></td>
        <td><b><?php echo "<span style='font-family:rupee;font-size:14px'>".'R'.$balance.'&nbsp;'; ?></b></td>
        <td><b><?php echo "<span style='font-family:rupee;font-size:14px'>".'R'.$row_hpay[0].'&nbsp;'; ?></b></td>
        <td width="70"><b><?php echo "<span style='font-family:rupee;font-size:14px'>".'R'.$row_tpay[0].'&nbsp;'; ?></b></td>
        <td width="70"><b><?php echo "<span style='font-family:rupee;font-size:14px'>".'R'.$expense.'&nbsp;'; ?></b></td>
        <td width="70"><b><?php echo "<span style='font-family:rupee;font-size:14px'>".'R'.$profit.'&nbsp;'; ?></b></td>
        </tr>
        </table>
        <div id="phone">
        </div>     
        <div class="addclients_b">
        <form>
       	<table class="pdf">
        <?php 
        echo "<tr>";
		echo "<td>";
		echo "<a href='viewpdf.php?id=$id'>Print</a>";
        echo "</td>";
		echo "<td>"; 
		echo "<a href='?id2'>Cancel</a>";
		echo "</td>"; 
		echo "</tr>";
        ?>
        </table>
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
