<?php
session_start();
error_reporting(0);
include("../include/database.php");

$a=$_SESSION['user'];
$c=$_SESSION['com'];
$per_page = 25; 
if($_GET)
{
 $page=$_GET['page'];
}
	
$start = ($page-1)*$per_page;
$qry_u="select * from booking_form order by bkg_date desc where c_id='$c' limit $start,$per_page";
$res_u=mysql_query($qry_u);
		
?>

        <table class="emp_tab">
        <tr class="menu_header">
        <td width="150">B.No</td>
        <td width="150">B.Date</td>
        <td>SE</td>
        <td>Office</td>
        <td width="70">Pax</td>
        <td width="70">Adult</td>
        <td width="70">Child</td>
        <td width="115">View Details</td>
        </tr>

        <?php
		while($row_u=mysql_fetch_array($res_u))
		{
        echo "<tr class='pagi'>";
        echo "<td>";
		echo $row_u[0]; 
		echo "</td>";
        echo "<td>";
		echo date('d-m-Y', strtotime($row_u[2]));
		echo "</td>";
		echo "<td>";
		echo $row_u[3];
		echo "</td>";
		echo "<td>";
		echo $row_u[4];
		echo "</td>";
		echo "<td>";
		echo $row_u[5];
		echo "</td>";
		echo "<td>";
		echo $row_u[6];
		echo "</td>";
		echo "<td>";
		echo $row_u[7];
		echo "</td>";
		echo "<td class='print'>";
		echo "<a href='viewdetail.php?id=$row_u[0]'>View Details</a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
        
        </table>
