<?php
include("include/database.php");
error_reporting(0);	

$per_page = 20; 

if($_GET)
{
$page=$_GET['page'];

}
	
	$start = ($page-1)*$per_page;
	$c_qry_f="select * from quotation order by q_id desc limit $start,$per_page";
	$c_res_f=mysql_query($c_qry_f);
		
?>

        <table class="emp_tab">
        <tr class="emp_header">
        <td width="80">Q No.</td>
        <td width="250">Client Name</td>
        <td width="160">Kind Attend</td>
        <td>Site Address</td>
        <td width="180">Contact No.</td>
        <td width="100">Action</td>
        </tr>

        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
        echo "<tr class='emp_header'>";
		echo "<td>";
		echo $c_row[0];
		echo "</td>";
        echo "<td width='250'>";
		echo $c_row[3];
		echo "</td>";
        echo "<td width='160'>";
		echo $c_row[5];
		echo "</td>";
		echo "<td>";
		echo $c_row[4];
		echo "</td>";
		echo "<td>";
		echo $c_row[6];
		echo "</td>";
		echo "<td width='100' class='print'>";
		echo "<a href='quotationbasic.php?i_id=$c_row[0]'>Details</a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
        
        </table>
