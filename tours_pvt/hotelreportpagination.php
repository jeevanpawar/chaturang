<?php
include("../session/session.php");
	error_reporting(0);
	include("../include/database.php");
	$per_page = 20; 
	if($_GET)
	{
		$page=$_GET['page'];
	}
	$start = ($page-1)*$per_page;
	$c_qry_f="select * from hotel order by h_id desc limit $start,$per_page";
	$c_res_f=mysql_query($c_qry_f);
	$row=mysql_num_rows($c_res_f);
	
	
?>
<?php
if(isset($_REQUEST['go']))
{
	$t1=$_REQUEST['result'];
	$qry="select * from Booking_form where b_id='$t1'";
	$res=mysql_query($qry);
	$count=mysql_num_rows($res);
}
?>

        <form action="" method="post">
       	<table class="emp_tab">
        <tr class="search_res">
        <td class="info">
       <input class="searchfield" type="text" value="Search..." onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" name="result" />
        <input class="go" name="go" type="submit" value="Search">
        <a href="hotelreportpdf.php">Print</a>Hotel Reports
        </td>        </tr>
        </table>
        </div>
        </form>

        <table class="emp_tab" id="history">
        <tr class="menu_header">
        <td width="120">Registration No</td>
        <td>Hotel Name</td>
        <td>Concern Person</td>
        <td>Contact No</td>
        <td width="150">Payments (<span style="font-family:rupee;font-size:13px">R)</td>
        <td width="150">Packages</td>
        <td width="150">Transactions</td>
        
        </tr>
        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
		$qry_h="select SUM(h_amt) from hotel_pay where h_name='$c_row[2]'";
		$res_h=mysql_query($qry_h);
		$row_h=mysql_fetch_array($res_h);
        echo "<tr class='pagi'>";
        echo "<td>";
		echo $c_row[4];
		echo "</td>";
		echo "<td>";
		echo $c_row[2];
		echo "</td>";
		echo "<td>";
		echo $c_row[5];
		echo "</td>";
		echo "<td>";
		echo $c_row[6];
		echo "</td>";
		echo "<td>";
		echo $row_h[0];
		echo "</td>";
		echo "<td>";
		echo "View";
		echo "</td>";
		echo "<td>";
		echo "View";
		echo "</td>";
		
		
		}
		?>
      
        </table>
