<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page =19; 
if($_GET)
{
 $page=$_GET['page'];
}
$start = ($page-1)*$per_page;
$qry_u="select * from hotel order by h_id desc limit $start,$per_page";
$hotel_res=mysql_query($qry_u);
?>

        <table class="emp_tab">
        <tr class="menu_header">
        <td width="140">Registration No</td>
        <td>Hotel Name</td>
        <td>Hotel Address</td>
        <td>Contact Person</td>
        <td width="200">Contact No</td>
        <td width="75">Delete</td>
        <td width="75">Update</td>
        </tr>
       
		<?php
		
			while($row_hotel=mysql_fetch_array($hotel_res))
			{
				echo "<tr class='pagi'>";
				echo "<td>";
				echo $row_hotel[4];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[2];
  				echo "</td>";
				echo "<td>";
				echo $row_hotel[3];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[5];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[4];
				echo "</td>";
				echo "<td class='print'>";
				echo "<a href='?del_id=$row_hotel[0]' onclick='return confirmSubmit()'>Delete</a>";
				echo "</td>";
				echo "<td class='print'>";
				echo "<a href='updatehotel.php?uid=$row_hotel[0]'>Update</a>";
				echo "</td>";
				echo "</tr>";
			}
		?>
        </table>
