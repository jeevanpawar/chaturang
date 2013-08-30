<?php
	session_start();
	error_reporting(0);
	$a=$_SESSION['user'];
	$c=$_SESSION['com'];
	if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
	include("../include/database.php");
	$c_qry_f="select * from hotel order by h_id desc";
	$c_res_f=mysql_query($c_qry_f);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt. Ltd.</title>
<link rel="stylesheet" href="../print.css" type="text/css" />
</head>
<body>
<div class="inv">Hotel Payment Report</div>
       <table class="tabpdf">
        <tr>
        <td width="70">Registration No</td>
        <td>Hotel Name</td>
        <td>Concern Person</td>
        <td width="100">Contact No</td>
        <td width="80">Payments</td>
      
        </tr>
        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
		$qry_h="select SUM(h_amt) from hotel_pay where h_name='$c_row[2]'";
		$res_h=mysql_query($qry_h);
		$row_h=mysql_fetch_array($res_h);
        echo "<tr class='pagi'>";
        echo "<td>";
		echo $c_row[4];
		echo "</td>";
		echo "<td>";
		echo $c_row[2];
		echo "</td>";
		echo "<td>";
		echo $c_row[5];
		echo "</td>";
		echo "<td>";
		echo $c_row[6];
		echo "</td>";
		echo "<td>";
		echo $row_h[0];
		echo "</td>";
	
		}
		?>
      
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