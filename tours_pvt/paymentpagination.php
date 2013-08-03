<?php
	session_start();
	error_reporting(0);
	$a=$_SESSION['user'];
	$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
	include("../include/database.php");
	$per_page = 20; 
	if($_GET)
	{
		$page=$_GET['page'];
	}
	$start = ($page-1)*$per_page;
	$c_qry_f="select * from booking_form where c_id='$c' order by b_id desc limit $start,$per_page";
	$c_res_f=mysql_query($c_qry_f);
	$row=mysql_num_rows($c_res_f);
	
	
?>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="150">Bkg No</td>
        <td width="150">Bkg Date</td>
        <td>SE</td>
        <td width="150">Total Amt</td>
        <td width="90">Clients</td>
        <td width="90">Hotel/Vendor</td>
        <td width="90">Transport</td>
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
		echo $c_row[8];
		echo "</td>";
		$qry_p="select SUM(p_amt) from partial_payment where b_id='$c_row[0]'";
		$res_p=mysql_query($qry_p);
		$row_p=mysql_fetch_array($res_p);

		if($c_row[8]==$row_p[0])
		{
		echo "<td class='print'>";
		echo "<a href='pay.php?id=$c_row[0]'>Payment</a>";
		echo "</td>";
		}
		else
		{
		echo "<td class='insert'>";
		echo "<a href='pay.php?id=$c_row[0]'>Payment</a>";
		echo "</td>";
		}
		$qry_h="select * from hotel_pay where b_id='$c_row[0]'";
		$res_h=mysql_query($qry_h);
		$hotel=mysql_num_rows($res_h);
		
		$row_h=mysql_fetch_array($res_h);
		if($hotel > 0)
		{
		echo "<td class='print'>";
		echo "<a href='hoteldetail.php?id=$c_row[0]'>Payment</a>";
		echo "</td>";
		}
		else
		{
		echo "<td class='insert'>";
		echo "<a href='hoteldetail.php?id=$c_row[0]'>Payment</a>";
		echo "</td>";
		}
		$qry_h="select * from trans_pay where b_id='$c_row[0]'";
		$res_h=mysql_query($qry_h);
		$trans=mysql_num_rows($res_h);
		if($trans>0)
		{
		echo "<td class='print'>";
		echo "<a href='transdetail.php?id=$c_row[0]'>Payment</a>";
		echo "</td>";
		echo "</tr>";
		}
		else
		{
		echo "<td class='insert'>";
		echo "<a href='transdetail.php?id=$c_row[0]'>Payment</a>";
		echo "</td>";
		echo "</tr>";	
		}
		}
		?>
      
        </table>
