<?php
	session_start();
	error_reporting(0);
	$a=$_SESSION['user'];
	$c=$_SESSION['com'];
	$id=$_REQUEST['id'];
	include("../include/database.php");
	$qry="select * from vehicle_transportation where b_id='$id'";
	$res=mysql_query($qry);
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
        <td>Vehicle Type</td>
        <td>Pick Up Date</td>
        <td>Pick Up Point</td>
        <td width="200">Drop Date</td>
        <td>Drop Point</td>
        <td>No of Days</td>
        <td width="95">Action</td>
        </tr>
       
		<?php
		
			while($row_hotel=mysql_fetch_array($res))
			{
				echo "<tr class='pagi'>";
				echo "<td>";
				echo $row_hotel[3];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[4];
				echo "</td>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_hotel[5]));
				echo "</td>";
				echo "<td>";
				echo $row_hotel[6];
				echo "</td>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_hotel[7]));
				echo "</td>";
				echo "<td>";
				echo $row_hotel[8];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[9];
				echo "</td>";
				echo "<td class='print'>";
				echo "<a href='transpay.php?id2=$row_hotel[0]&&id=$id'>Payment</a>";
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
