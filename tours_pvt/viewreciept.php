<?php
session_start();
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
error_reporting(0);

include("../include/database.php");
$id=$_REQUEST['id'];
$qry="select * from reciept where p_id='$id'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

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
<style type="text/css">
.cash
{
	border:1px solid #CCC;
	width:100%;
	height:500px;
}
.cash tr td
{
	padding-left:50px;
	letter-spacing:1px;
	height:50px;
}
</style>
</head>
<body>
        <?php
		$qry_r="select * from partial_payment where p_id='$id'";
		$res_r=mysql_query($qry_r);
		$row_r=mysql_fetch_array($res_r);
		?>
        <?php
		if($row_r[3]=='Cash')
		{
			echo "<table class='cash'>";
			echo "<tr>";
			echo "<td align='center'>";
			echo "RECIEPT - CLIENT";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Reciept No:$row[0]";
			echo "</td>";
			echo "<td>";
			echo "Date:";echo date('d-m-Y', strtotime ($row[4]));
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Recieved with thanks from Mr/Mrs/Ms $row_name[3]";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Sum of Rs.[By Cash]";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "for the chaturang tours in part/final payment towards Booking Ref. No.";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Chaturang Tours";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
		if($row_r[3]=='Cheque')
		{
			echo "<table class='cash'>";
			echo "<tr>";
			echo "<td align='center'>";
			echo "RECIEPT - CLIENT";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Reciept No:$row[0]";
			echo "</td>";
			echo "<td>";
			echo "Date:";echo date('d-m-Y', strtotime ($row[4]));
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Recieved with thanks from Mr/Mrs/Ms $row_name[3]";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Sum of Rs";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "By Cheque No:$row[6]";
			echo "</td>";
			echo "<td>";
			echo "Dated:$row[4]";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "on Bank";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "for the chaturang tours in part/final payment towards Booking Ref. No.$row[3]";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Chaturang Tours";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
		if($row_r[3]=='Online Transfer')
		{
			echo "<table class='cash'>";
			echo "<tr>";
			echo "<td align='center'>";
			echo "RECIEPT - CLIENT";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Reciept No:$row[0]";
			echo "</td>";
			echo "<td>";
			echo "Date:";echo date('d-m-Y', strtotime ($row[4]));
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Recieved with thanks from Mr/Mrs/Ms $row_name[3]";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Sum of Rs";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "through on line transfer effected in bank name";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "on Bank";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "for the chaturang tours in part/final payment towards Booking Ref. No.$row[3]";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Chaturang Tours";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
        ?>      
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