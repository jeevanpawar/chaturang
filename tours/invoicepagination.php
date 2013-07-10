<?php
session_start();
error_reporting(0);
$a=$_SESSION['user'];
$c=$_SESSION['comp'];
include("../include/database.php");
$per_page = 20; 
if($_GET)
{
$page=$_GET['page'];
}
//get table contents
$start = ($page-1)*$per_page;
$sql = "select * from invoice order by i_id desc limit $start,$per_page";
$rsd = mysql_query($sql);
?>

				<table class="emp_tab">
                <tr class="menu_header">
                <td width="80">In. No</td>
                <td width="250">Client Name</td>
                <td width="160">Date</td>
                <td> Address</td>
                <td width="50">Print</td>
                </tr>
                
        <?php
		
		while($row=mysql_fetch_array($rsd))
		{		
        	echo "<tr class='pagi'>";
                echo "<td>";
                echo $row[0];
                echo "</td>";
                echo "<td>";
                echo $row[3];
                echo "</td>";
                echo "<td>";
                echo $row[1];
                echo "</td>";
                echo "<td>";
                echo $row[4];
                echo "</td>";
				echo "<td class='print'>";
                echo "<a href='report.php?id=$row[0]&&id2=$row[1]'>Print</a>";
                echo "</td>";
                echo "</tr>";
                
		}
		?>
        
        
        </table>
