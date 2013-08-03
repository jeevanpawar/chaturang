<?php
session_start();

error_reporting(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
include("../include/database.php");
?>
<?php
$qry_c="select * from company where comp_id='$c'";
$res_c=mysql_query($qry_c);
$row_c=mysql_fetch_array($res_c);
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
<body bgcolor="#FFF">
	
        <div>
		<br>
        <br>
        <div class="pdfhead"><center><?php echo $row_c['comp_name']; echo "&nbsp;Booking Form No-$id"; ?></center></div>

		<table class="emp_pdf">
        <tr class="pdf_header">
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
        <td width="150"><?php echo $row[0]; ?></td>
        <td width="150"><?php echo date('d-m-Y', strtotime ($row[2])); ?></td>
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
         echo "<table class='emp_pdf'>";
		 echo "<tr class='pdf_header'>";
		 echo "<td colspan='6'>"; echo "Tourist Information"; echo "</td>";
		 echo "</tr>";
         echo "<tr class='pdf_header'>";
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
         echo "<table class='emp_pdf'>";
		 echo "<tr class='pdf_header'>";
		 echo "<td colspan='7'>"; echo "Hotel Accommodation Details"; echo "</td>";
		 echo "</tr>";
         echo "<tr class='pdf_header'>";
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
         echo "<table class='emp_pdf'>";
		 echo "<tr class='pdf_header'>";
		 echo "<td colspan='7'>"; echo "Vehicle Transportation Details"; echo "</td>";
		 echo "</tr>";
		 
         echo "<tr class='pdf_header'>";
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
         <br><br>
        <table class="emp_pdf">
        <tr class="pdf_header">
        <td colspan="7">Profit and Expense Details</td>
        </tr>
        <tr class="pdf_header">
        <td width="100">Package Cost</td>
        <td width="100">Client Payment</td>
        <td width="100">Client Balance</td>
        <td width="120">Hotel/Vendor Payment</td>
        <td width="120">Transportation Payment</td>
        <td width="150">Total Expense</td>
        <td width="150">Gross Profit</td>
        </tr>
        <tr class="pagi">
        <td><b><?php echo $row[8].'&nbsp;'.'Rs/-'; ?></b></td>
        <td><b><?php echo $row_cpay[0].'&nbsp;'.'Rs/-'; ?></b></td>
        <td><b><?php echo $balance.'&nbsp;'.'Rs/-'; ?></b></td>
        <td><b><?php echo $row_hpay[0].'&nbsp;'.'Rs/-'; ?></b></td>
        <td><b><?php echo $row_tpay[0].'&nbsp;'.'Rs/-'; ?></b></td>
        <td><b><?php echo $expense.'&nbsp;'.'Rs/-'; ?></b></td>
        <td><b><?php echo $profit.'&nbsp;'.'Rs/-'; ?></b></td>
        </tr>
        </table>
    </div>
</div>
</body>
</html>

<?php
$htmlcontent=ob_get_clean();
include("dompdf/dompdf_config.inc.php");
  $htmlcontent = stripslashes($htmlcontent);
  $dompdf = new DOMPDF();
  $dompdf->load_html($htmlcontent);
  $dompdf->set_paper("folio", "landscape");
  $dompdf->render();
  $dompdf->stream($filename, array("Attachment" => false));	
  exit(0);
?>
