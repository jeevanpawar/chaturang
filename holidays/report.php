<?php
session_start();
error_reporting(0);

include("../include/database.php");
$a=$_SESSION['user'];
$c=$_SESSION['com'];

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
<style type="text/css">
.heading
{
	font-size:36px;
	font-family:"MS Serif", "New York", serif;
	text-decoration:underline;
}
.sub_heading
{
	font-size:20px;
	font-family:"MS Serif", "New York", serif;
}
.quotation
{
	font-size:24px;
	font-weight:bold;
	text-decoration:underline;
}
.date
{	
	margin-left:80%;
}
.description ul
{
	border:1px solid #000; 
}
.description ul li
{	
	list-style:none;
	display:inline;
	padding:20px;
}
.report
{
	width:720px;
	margin-top:15px;
}
.report td
{
		border:1px solid #000;
		text-align:center;
		height:25px;
}
.advance
{
	width:615px;
	margin-left:310px;
}
.advance td
{
	border:1px solid #000;
	text-align:center;
	height:25px;
}
.total
{
	width:720px;
}
.total td
{
	
}
.tow
{
	margin-top:-90px;
	padding-top:-60px;
}
.da
{

	margin-left:540px;
}
.texta
{
	width:20px;

	border:1px solid #000;
}
.tab
{
	width:400px;
	
}
</style>
</head>

<body>
<br>
<br>

<br><br>
<div class="quotation"><center>INVOICE</center></div>
<div class="to">
<div class="da">
Invoice No : <label><?php echo $row[1]; ?></label>
<br>
Date&nbsp;:&nbsp;<label><?php echo $row[1]; ?></label>

</div>
<div class="tow">
<table class="tab">
<tr>
<td>
To
</td>
</tr>
<tr>
<td>
M/s: <label><?php echo $row[3]; ?></label></td>
</tr>
<tr>
<td>
Address <label><?php echo $row[4]; ?></label></td>
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