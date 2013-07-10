<?php
include("../include/database.php");
error_reporting(0);	
$per_page = 20; 
if($_GET)
{
	$page=$_GET['page'];

}
	
	$start = ($page-1)*$per_page;
	$c_qry_f="select * from clients order by c_id desc limit $start,$per_page";
	$c_res_f=mysql_query($c_qry_f);
		
?>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="250">Client Name</td>
        <td width="160">Contact No.</td>
        <td>Site Address</td>
        <td width="90">Action</td>
        </tr>

        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
        echo "<tr class='pagi'>";
        echo "<td>";
		echo $c_row[2]; echo "&nbsp;"; echo $c_row[3];
		echo "</td>";
        echo "<td>";
		echo $c_row[8];
		echo "</td>";
		echo "<td>";
		echo $c_row[4];
		echo "</td>";
		
        echo "<td class='print'>";
		echo "<a href='quotationI.php?c_id2=$c_row[0]'>Generate</a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
        
        </table>
