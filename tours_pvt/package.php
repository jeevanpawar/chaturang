<?php
session_start();
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
error_reporting(0);
include("../include/database.php");
$sql = "select * from booking_form where c_id=".$c; 
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page)
?>
<?php
if(isset($_REQUEST['go']))
{
	$t1=$_POST['s_date'];
	$t2=$_POST['e_date'];
	$qry="select * from Booking_form where bkg_date >='".$t1."' and bkg_date<='".$t2."'";
	$res=mysql_query($qry);
	$count=mysql_num_rows($res);
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
        <form action="" method="post">
       	<table class="emp_tab">
        <tr class="search_res">
        <td class="info">
        Start Date<input type="text" name="s_date" value="<?php echo date('Y-m-d'); ?>"/>
        &nbsp;End Date<input type="text" name="e_date" value="<?php echo date('Y-m-d'); ?>"/>
        <input class="go" name="go" type="submit" value="View">
        <a href="">Print</a>
        </td>
        </tr>
        </table>
        </div>
        </form>

        <?php
		if($count > '0')
		{
        if(isset($_REQUEST['go']))
        {	
			$row=mysql_fetch_array($res);
			echo "<table class='emp_tab'>";
			echo "<tr class='menu_header'>";
        	echo "<td width='150'>Bkg No</td>";
        	echo "<td width='150'>Bkg Date</td>";
        	echo "<td>SE</td>";
        	echo "<td width='150'>Total Amt</td>";
        	echo "<td width='90'>Clients</td>";
        	echo "<td width='145'>Hotel/Vendor</td>";
        	echo "<td width='165'>Transport</td>";
        	echo "</tr>";
			echo "<tr class='pagi'>";
			echo "<td>";
			echo $row[0]; 
			echo "</td>";
			echo "<td>";
			echo date('d-m-Y', strtotime($row[2]));
			echo "</td>";
			echo "<td>";
			echo $row[3];
			echo "</td>";
			echo "<td>";
			echo $row[8];
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='pay.php?id=$row[0]'>Payment</a>";
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='hoteldetail.php?id=$row[0]'>Hotel/Vendor</a>";
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='transdetail.php?id=$row[0]'>Transportation</a>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "<br>";
        }
		}
		?>
    
                 
                </div>                
               
  				</div>
                
                </div>
      	<div class="clear"></div>
    
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
