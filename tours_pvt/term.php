<?php
session_start();
error_reporting(0);

include("../include/database.php");
$a=$_SESSION['user'];
$c=$_SESSION['com'];

if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
	$e_qry_f="select * from terms";
	$e_res_f=mysql_query($e_qry_f);
		
?>
<?php
	if(isset($_REQUEST['e_id1']))
	{
		$e_d=$_REQUEST['e_id1'];
		$e_del="delete from terms where t_id=".$e_d;
		$e_dres=mysql_query($e_del);
		if($e_dres)
		{
			header("location:term.php");
		}
		else
		{
			echo "error";
		}
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
         
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</head>

<body>
<div id="container">
	<div id="sub-header">
    <?php 
		include("include/p_header.php");
	?>
    	<br />
		<div class="quotation"><center>Terms and Conditions</center></div>
        <div>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="100">Term No.</td>
        <td>Terms & Conditions</td>
        <td width="140">Action</td>        
        </tr>
        <?php
		while($e_row=mysql_fetch_array($e_res_f))
		{
        echo "<tr class='pagi'>";
        echo "<td>";
		echo $e_row[0];
		echo "</td>";
        echo "<td>";
		echo $e_row[1];
		echo "</td>";
        echo "<td class='print'>";
		echo "<a href='?e_id1=$e_row[0]'>Delete</a>&nbsp;<a href='updateterm.php?e_id2=$e_row[0]'>Update</a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
        </table>
        </div>
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
