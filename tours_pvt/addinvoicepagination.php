<?php
session_start();
error_reporting(0);
include("../include/database.php");
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
$per_page = 20; 

if($_GET)
{
$page=$_GET['page'];

}
	
	$start = ($page-1)*$per_page;
	$c_qry_f="select * from booking_form where c_id='$c' order by b_id desc limit $start,$per_page";
	$c_res_f=mysql_query($c_qry_f);
		
?>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="250">Booking No</td>
        <td width="160">Bkg Date.</td>
        <td>SE</td>
        <td>Office</td>
        <td>Pax</td>
        <td>Adult</td>
        <td>Child</td>
        <td>Amount</td>
        <td width="105">Action</td>
        </tr>

        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
        echo "<tr class='pagi'>";
        echo "<td>";
		echo $c_row[0];
		echo "</td>";
        echo "<td>";
		echo date('d-m-Y', strtotime($c_row[2]));
		echo "</td>";
		echo "<td>";
		echo $c_row[3];
		echo "</td>";
		echo "<td>";
		echo $c_row[4];
		echo "</td>";
		echo "<td>";
		echo $c_row[5];
		echo "<td>";
		echo $c_row[6];
		echo "</td>";
		echo "<td>";
		echo $c_row[7];
		echo "</td>";
		echo "<td>";
		echo $c_row[8];
		echo "</td>";
		echo "</td>";
		echo "<td class='print'>";
		echo "<a href='invoicebasic.php?c_id1=$c_row[0]'>Generate</a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
        
        </table>
