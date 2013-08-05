<?php
session_start();
error_reporting(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
include("../include/database.php");

$id=$_REQUEST['id'];
$id2=$_REQUEST['id2'];

$qry_c="select * from company where comp_id='$c'";
$res_c=mysql_query($qry_c);
$row_c=mysql_fetch_array($res_c);

$qry_n="select * from booking_form where b_id='$id'";
$res_n=mysql_query($qry_n);
$row_n=mysql_fetch_array($res_n);

$c_query="select * from hotel_acomodation where h_id='$id2' and b_id='$id'";
$c_res=mysql_query($c_query);
$c_row=mysql_fetch_array($c_res);

$qry="select * from hotel where h_name='$c_row[4]'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$ep=mysql_query("select * from meal where m_sort='$c_row[7]'");
$r_meal=mysql_fetch_array($ep);
?>

<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<style type="text/css">
.header
{
	font-size:20px;
	font-weight:bold;
	letter-spacing:1px;
}
.date
{
	margin-left:450px;
}
.hname
{
	font-weight:bold;
	letter-spacing:1px;
	text-transform:uppercase;
}
.detail
{
	margin-left:80px;
}
.add
{
	width:350px;
}
.hotel
{}
</style>
</head>
<body>
<div class="hotel">
<br><br><br>
<div class="header" align="center">
HOTEL CONFIRMATION FORM
</div>
<br><br><br><br>
<div><b><u>Ref No:&nbsp;<?php echo $id.'/'.$c_row['cnt']; ?></u></b>
<span class="date">Date:&nbsp;<?php echo date('d-m-Y'); ?></span></div>
<br><br>
<div>To,
</div>
<br><br>
<div class="hname"><?php echo $c_row[4]; ?>
</div>
<div class="add"><?php echo $row[3]; ?>
</div>
<br>
<br><br>
<div><b><u>Please provide the following services to </u></b> <span>&nbsp;&nbsp;&nbsp;: <?php echo $row_n[3];?></span>
</div>
<br>
<br><br>
<div><b><u>Booked to stay with you from  </u></b><span class="detail">: C/in on <?php echo date('d-M-Y', strtotime($c_row[8]));?> to C/ out on C/in on <?php echo date('d-M-Y', strtotime($c_row[9]));?></span>
</div>
<br>
<br><br>
<div><b><u>Services to be provided</u></b><br><br>1. Accommodation using  <?php echo $c_row[6];?><br>2. <?php echo $r_meal[2];?>
</div>
<br>
<br><br>
<div><b><u>Reservation confirmation by</u></b>&nbsp;<b><u>Confirmed by</u></b>
</div>
<br>
<br><br>
<div><b><u>Billing Instructions</u></b><br><br>
Prepaid by Chaturang Tours for Accommodation and Selected Services.
</div>
<br>
<br><br>
<div><b><u>Remarks</u></b>
</div>
<br>
<br><br>
<div><b>Guest VIP</b>
</div>
<br>
<br><br>
<div><b>For <?php echo $row_c[1]; ?>-Nasik</b>
</div>
<br>
<br><br>
<br><br>
<br><br>
<div><b>Manager-Admin & Sales</b>
</div>
<br>
<br><br>
<div>This is an auto generated vouchers.
</div>
<br>
<div>No Signature Needed.
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
  $dompdf->set_paper("folio", "portrait");
  $dompdf->render();
  $dompdf->stream($filename, array("Attachment" => false));	
  exit(0);
?>