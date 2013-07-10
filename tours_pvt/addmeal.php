<?php
session_start();
$a=$_SESSION['user'];
$c=$_SESSION['com'];
error_reporting(0);

include("../include/database.php");

$qry_d="select * from meal";
$res_d=mysql_query($qry_d);
$count=mysql_num_rows($res_d);

	if(isset($_REQUEST['e_add']))
	{
 		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
 		$qry="insert into meal(m_sort,m_full) values('".$t1."','".$t2."')";
		$res=mysql_query($qry);
		if($res)
		{
			header("location:addmeal.php");
		}
		else
		{
			echo "error";
		}
	}
	if(isset($_REQUEST['id_d']))
	{
		$del=$_REQUEST['id_d'];
		$qry_d="delete from meal where m_id=".$del;
		$res_d=mysql_query($qry_d);
		if($res_d)
		{
			header("location:addmeal.php");
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
		<div class="quotation"><center>Meal Type Details</center></div>
        <div>
        <br />
        <table class="detail">
        <tr class="menu_header">
        <td>Meal Type</td>
        <td>Description</td>
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
			echo "<td>";
			echo $row_d[2];
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='addmeal.php?id_d=$row_d[0]'>Delete</a>";
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='upmeal.php?id_u=$row_d[0]'>Update</a>";
			echo "</td>";
			echo "</tr>";
		}
		?>
        </table>
        <form name="form1" action="" method="post">
        <table class="pay">
        <tr class="menu_header"><td colspan="2">Add New Meal Type</td></tr>
        <tr>
        <td class="l_form">No:</td>
        <td><input id="ename" type="text" readonly class="q_in" value="<?php echo $count+1; ?>"></td>
        </tr>
        <tr>     
        <td class="l_form">Meal Type:</td>
        <td><input type="text" name="t1" class="q_in"></td>
        </tr>
        <tr>     
        <td class="l_form">Description:</td>
        <td><input type="text" name="t2" class="q_in"></td>
        </tr>
        
        </table>
        <div class="pay_button">
         <input name="e_add" class="formbutton" value=" Add " type="submit" onClick="javascript:return validateMyForm();" />
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
