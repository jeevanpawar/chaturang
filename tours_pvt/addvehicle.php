<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");

$qry_d="select * from vehicle";
$res_d=mysql_query($qry_d);
$count=mysql_num_rows($res_d);

	if(isset($_REQUEST['e_add']))
	{
 		$t1=$_POST['t1'];
 		$qry="insert into vehicle(v_name) values('".$t1."')";
		$res=mysql_query($qry);
		if($res)
		{
			header("location:addvehicle.php");
		}
		else
		{
			echo "error";
		}
	}
	if(isset($_REQUEST['id_d']))
	{
		$del=$_REQUEST['id_d'];
		$qry_d="delete from vehicle where v_id=".$del;
		$res_d=mysql_query($qry_d);
		if($res_d)
		{
			header("location:addvehicle.php");
		}
	}
	
	if(isset($_REQUEST['e_can']))
	{
		header("location:addvehicle.php");
	}
	
?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="custom.js"></script>
</head>
<body>
<div id="container">
	 <div id="sub-header">
    	<?php
			include("include/p_header.php");
		?>
       	<table class="emp_tab">
        <tr class="search_res">
        <td class="info">
         <center>Vehicle Details</center>
        </td>        </tr>
        </table>
		<span class="bank"><a href="#" rel="popuprel" class="popup new">New</a> </span>
        <div>
        <br />
        <table class="detail">
        <tr class="menu_header">
        <td>Vehicle Name</td>
        <td width="75">Delete</td>
        <td width="80">Update</td>
        </tr>
        <?php
		while($row_d=mysql_fetch_array($res_d))
		{
			echo "<tr class='pagi'>";
			echo "<td>";
			echo $row_d[1];
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='addvehicle.php?id_d=$row_d[0]'>Delete</a>";
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='upvehicle.php?id_u=$row_d[0]'>Update</a>";
			echo "</td>";
			echo "</tr>";
		}
		?>
        </table>
        <div class="popupbox_small" id="popuprel">
		<div id="intabdiv">
        <form name="" action="" method="post">
        <table class="pay">
        <tr><td colspan="2"><center>Add New Vehicle</center></td></tr>
        <tr>
        <td class="l_form">No:</td>
        <td><input id="ename" type="text" readonly class="q_in" value="<?php echo $count+1; ?>"></td>
        </tr>
             
        <td class="l_form">Vehicle Name:</td>
        <td><input type="text" name="t1" class="q_in"></td>
        </tr>
        
        </table>
        <div class="bank_b">
         <input name="e_add" value=" Add " type="submit"/>
         <input name="e_can" value="Cancel" type="submit" />
        </div>
        </form>
        </div>
        </div>
    </div>
    </div>
        
    <div id="fade"></div>
    	<div class="clear"></div>
    </div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
