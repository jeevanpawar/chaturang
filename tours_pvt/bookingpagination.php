<?php
session_start();
$per_page = 25; 
if($_GET)
{
 $page=$_GET['page'];
}
include("../include/database.php");
	
$start = ($page-1)*$per_page;
$qry_u="select * from booking_form order by bkg_date desc limit $start,$per_page";
$res_u=mysql_query($qry_u);

$qry_a="select * from booking_form";
$res_a=mysql_query($qry_a);
$row_a=mysql_fetch_array($res_a);

?>

        <table class="emp_tab">
        <tr class="menu_header">
        <td width="110">B.No</td>
        <td width="110">B.Date</td>
        <td width="150">SE</td>
        <td>Office</td>
        <td width="50">Pax</td>
        <td width="50">Adult</td>
        <td width="50">Child</td>
        <td width="70">Passenger</td>
        <td width="85">Hotel</td>
        <td width="85">Vehicle</td>
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
		if($row_u[9]==1)
		{
			echo "<td class='print'>";
			echo "<a href='uppassenger.php?id_p=$row_u[0]'>&nbsp;Update&nbsp;</a>";
			echo "</td>";
		}
		else
		{
			echo "<td class='insert'>";
			echo "<a href='passenger.php?id_p=$row_u[0]'>&nbsp;&nbsp;Insert&nbsp;&nbsp;</a>";
			echo "</td>";
		}
		if($row_u[10]==1)
		{
			echo "<td class='print'>";
			echo "<a href='accommodation.php?id_a=$row_u[0]'>&nbsp;Update&nbsp;</a>";
			echo "</td>";
		}
		else
		{
			echo "<td class='insert'>";
			echo "<a href='accommodation.php?id_a=$row_u[0]'>&nbsp;&nbsp;Insert&nbsp;&nbsp;</a>";
			echo "</td>";
			
		}
		if($row_u[11]==1)
		{
			echo "<td class='print'>";
			echo "<a href='vehicle_trans.php?id_v=$row_u[0]'>&nbsp;Update&nbsp;</a>";
			echo "</td>";
		}
		else
		{
			echo "<td class='insert'>";
			echo "<a href='vehicle_trans.php?id_v=$row_u[0]'>&nbsp;&nbsp;Insert&nbsp;&nbsp;</a>";
			echo "</td>";
		}
		echo "<td class='print'>";
		echo "<a href='viewdetail.php?id=$row_u[0]'>View Details</a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
        
        </table>
