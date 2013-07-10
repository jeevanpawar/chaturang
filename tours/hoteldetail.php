<?php
	session_start();
	error_reporting(0);
	$a=$_SESSION['user'];
	$c=$_SESSION['com'];
	$id=$_REQUEST['id'];
	include("../include/database.php");
	$hotel="select * from hotel_acomodation where b_id='$id'";
	$hotel_res=mysql_query($hotel);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />

</head>

<body>
<div id="container">
<div id="sub-header">
	<?php
    include("include/p_header.php");
    ?>
    
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="140">Vendor Name</td>
        <td>Hotel Name</td>
        <td>Place</td>
        <td>Room</td>
        <td width="200">Meal</td>
        <td>C_In</td>
        <td>C_Out</td>
        <td width="85">Action</td>
        </tr>
       
		<?php
		
			while($row_hotel=mysql_fetch_array($hotel_res))
			{
				echo "<tr class='pagi'>";
				echo "<td>";
				echo $row_hotel[3];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[4];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[5];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[6];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[7];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[8];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[9];
				echo "</td>";
				echo "<td class='print'>";
				echo "<a href='hotelpay.php?id2=$row_hotel[0]&&id=$id'>Payment</a>";
				echo "</td>";
				echo "</tr>";
			}
		?>
        </table>
    </div>
    </div>
        
    
    	<div class="clear"></div>
    </div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
