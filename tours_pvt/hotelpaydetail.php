<?php
	session_start();
	$a=$_SESSION['user'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
	error_reporting(0);
	include("../include/database.php");
	if(isset($_REQUEST['id']))
	{
		session_destroy();
		header("location:index.php");
	}
	$hotel="select * from hotel";
	$hotel_res=mysql_query($hotel);
?>
<?php
if(isset($_REQUEST['del_id']))
{
	$delhotel=$_REQUEST['del_id'];
	$del_qry="delete from hotel where h_id=".$delhotel;
	$del_res=mysql_query($del_qry);
	if($del_res)
	{
		
		header("location:hotel.php");
	}
	else
	{
		echo"Error!!!";
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<script type="text/javascript">
function confirmSubmit()
{
var agree=confirm("Are you sure to Delete this Entry?");
if (agree)
	return true ;
else
	return false ;
}

</script>
</head>

<body>
<div id="container">
<div id="sub-header">
	<?php
    include("include/p_header.php");
    ?>
    
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="140">Registration No</td>
        <td>Hotel Name</td>
        <td>Hotel Address</td>
        <td>Contact Person</td>
        <td width="200">Contact No</td>
        <td>Action</td>
        </tr>
       
		<?php
		
			while($row_hotel=mysql_fetch_array($hotel_res))
			{
				echo "<tr class='emp_header'>";
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
				echo " ";
				echo "<a href='updatehotel.php?uid=$row_hotel[0]'>Update</a>";
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
