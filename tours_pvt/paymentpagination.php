<?php
	session_start();
	error_reporting(0);
	$a=$_SESSION['user'];
	$c=$_SESSION['com'];
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
        <td width="145">Hotel/Vendor</td>
        <td width="165">Transport</td>
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
		echo "<td class='print'>";
		echo "<a href='pay.php?id=$c_row[0]'>Payment</a>";
		echo "</td>";
		echo "<td class='print'>";
		echo "<a href='hoteldetail.php?id=$c_row[0]'>Hotel/Vendor</a>";
		echo "</td>";
		echo "<td class='print'>";
		echo "<a href='transdetail.php?id=$c_row[0]'>Transportation</a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
      
        </table>
