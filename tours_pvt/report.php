<?php
session_start();
error_reporting(0);
include("../include/database.php");
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
$p=$_REQUEST['id'];
$d=$_REQUEST['id2'];
$qry="select * from invoice where i_no=".$p;
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$qry_detail="select * from sub_invoice where i_id=".$d;
$res_detail=mysql_query($qry_detail);

$qry_t="select SUM(amt) from sub_invoice where i_id=".$d;
$res_t=mysql_query($qry_t);
$row_t=mysql_fetch_array($res_t);

$balance=$row_t[0]-$row[6];
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt. Ltd.</title>
<link rel="stylesheet" href="../print.css" type="text/css" />
</head>
<body>
<div class="add">
<table>
<tr>
<td>Chaturang Tours Pvt Ltd</td>
</tr>
<tr>
<td>Shop No.4, Tirupati Tower-2, Ananad Nagar, Next to Akashwani Tower,</td>
</tr>
<tr>
<td>Ganagpur Road, Nashik-13. Ph: 0253-2579795.</td>
</tr>
</table>
</div>
<div class="no">
<table>
<tr>
<td colspan="2"></td>
</tr>
<tr>
<td>Invoice No :</td><td> <label><?php echo $row[1]; ?></label></td>
</tr>
<tr>
<td>Date&nbsp;:&nbsp;</td><td><label><?php echo $row[1]; ?></label></td>
</tr>
</table>
</div>
<div class="detail">
<table>
<tr>
<td>All India Holiday Packages</td>
<td>One Day/Group Picnics</td>
<td>Passport Assistance</td>
<td>Car Rentals</td>
</tr>
</table>
</div>
<table class="tab">
<tr>
<td>M/s: </td><td><label><?php echo $row[3]; ?></label></td>
</tr>
<tr>
<td>Address:</td><td> <label><?php echo $row[4]; ?></label></td>
</tr>
</table>
</div>
</div>
<div class="description">
<table class="report">
<tr>
<td width="50">Sr.No.</td>
<td>Paticulars</td>
<td width="70">Rate</td>
<td width="70">Amount</td>
</tr>
<?php
while($row_d=mysql_fetch_array($res_detail))
{
	
	echo "<tr>";
	echo "<td>";
	echo $row_d[3];
	echo "</td>";
	echo "<td>";
	echo $row_d[4];
	echo "</td>";
	echo "<td>";
	echo $row_d[5];
	echo "</td>";
	echo "<td>";
	echo $row_d[6];
	echo "</td>";
	echo "</tr>";
}
?>
</table>
<?php 

	$total=($row[7] / 100) * $row_t[0];
	$to=$total+$row_t[0];
	 

?>
</div>
<table class="advance">
<tr>
<td width="70">Advance</td><td><?php echo $row[6]; ?></td>
<td width="70">S.Tax</td><td><?php echo $row[7]; ?></td>
</tr>
<tr>
<td width="70">Balance</td><td><?php echo $balance; ?></td>
<td width="70">Total</td><td><?php echo $to; ?></td>
</tr>
</table>




</body>
</html>

<?php
$htmlcontent=ob_get_clean();

include("dompdf/dompdf_config.inc.php");


  $htmlcontent = stripslashes($htmlcontent);
  $dompdf = new DOMPDF();
  $dompdf->load_html($htmlcontent);
  $dompdf->set_paper("folio", "portrait");
  $dompdf->render();
  $dompdf->stream($filename, array("Attachment" => false));	
  exit(0);
?>