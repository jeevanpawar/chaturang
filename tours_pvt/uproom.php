<?php
include("../session/session.php");
error_reporting(0);

$up=$_REQUEST['id_u'];

include("../include/database.php");

$qry_u="select * from room_type where r_id='$up'";
$res_u=mysql_query($qry_u);
$row_u=mysql_fetch_array($res_u);

$qry_d="select * from room_type";
$res_d=mysql_query($qry_d);
$count=mysql_num_rows($res_d);

	if(isset($_REQUEST['e_add']))
	{
 		$t1=$_POST['t1'];
 		$qry="update room_type SET r_type='".$t1."' where r_id=".$up;
		$res=mysql_query($qry);
		if($res)
		{
			header("location:addroom.php");
		}
		else
		{
			echo "error";
		}
	}
	if(isset($_REQUEST['id_d']))
	{
		$del=$_REQUEST['id_d'];
		$qry_d="delete from room_type where r_id=".$del;
		$res_d=mysql_query($qry_d);
		if($res_d)
		{
			header("location:addroom.php");
		}
	}
	
	if(isset($_REQUEST['e_can']))
	{
		header("location:home.php");
	}
	
?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
</head>
<body>
<div id="container">
	 <div id="sub-header">
    	<?php
			include("include/p_header.php");
		?>
       	<br />
		<div class="quotation"><center>Room Type Details</center></div>
        <div>
        <br />
        <table class="detail">
        <tr class="menu_header">
        <td>Room Type</td>
        <td width="65">Delete</td>
        <td width="70">Update</td>
        </tr>
        <?php
		while($row_d=mysql_fetch_array($res_d))
		{
			echo "<tr class='pagi'>";
			echo "<td>";
			echo $row_d[1];
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='addroom.php?id_d=$row_d[0]'>Delete</a>";
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='uproom.php?id=$row_d[0]'>Update</a>";
			echo "</td>";
			echo "</tr>";
		}
		?>
        </table>
        <form name="form1" action="" method="post">
        <table class="pay">
        <tr class="menu_header"><td colspan="2">Add New Room Type</td></tr>
        <tr>
        <td class="l_form">No:</td>
        <td><input id="ename" type="text" readonly class="q_in" value="<?php echo $count+1; ?>"></td>
        </tr>
             
        <td class="l_form">Room Type:</td>
        <td><input type="text" name="t1" class="q_in" value="<?php echo "$row_u[1]";?>"></td>
        </tr>
        
        </table>
        <div class="pay_button">
         <input name="e_add" class="formbutton" value=" Update " type="submit" onClick="javascript:return validateMyForm();" />
         <input name="e_can" class="formbutton" value="Cancel" type="submit" />
        </div>
        
        </form>
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
