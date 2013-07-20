<?php
session_start();
$a=$_SESSION['user'];
$c=$_SESSION['com'];
error_reporting(0);

include("../include/database.php");

$id2=$_REQUEST['id2'];
$id=$_REQUEST['id'];
$qry="select * from hotel_acomodation where h_id=".$id2;
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$qry_d="select * from hotel_pay where p_id='$id2' and b_id='$id'";
$res_d=mysql_query($qry_d);

$qry_sum="select SUM(h_amt) from hotel_pay where p_id='$id2'";
$res_sum=mysql_query($qry_sum);
$row_sum=mysql_fetch_array($res_sum);

$bal=$row[8]-$row_sum[0];

$qry_r="select * from reciept where b_id='$id'";
$res_r=mysql_query($qry_r);
	if(isset($_REQUEST['e_add']))
	{
 		$t1=$_POST['t1'];
 		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$date=date('Y-m-d', strtotime($t4));
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$t7=$_POST['t7'];
		$pa_qry="insert into hotel_pay(c_id,b_id,h_name,h_vendor,h_date,h_mode,h_no,h_amt,p_id) values('".$c."','".$t1."','".$t2."','".$t3."','".$date."','".$t5."','".$t6."','".$t7."','".$id2."')";
		$pa_res=mysql_query($pa_qry);
		$id4 = mysql_insert_id();
		$m_id='CH1_'.$id4;
		
		$t1=$_POST['t1'];
 		$t2=$_POST['t2'];
		$date=date('Y-m-d', strtotime($t4));
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];

		$pa_qry="insert into reciept(p_id,c_id,b_id,r_date,r_mode,r_no,r_amt,m_id) values('".$id4."','".$c."','".$t1."','".$date."','".$t5."','".$t6."','".$t7."','".$m_id."')";
		
		
		
		$pa_res=mysql_query($pa_qry);
		if($pa_res)
		{
			header("location:hotelpay.php?id2=$id2&&id=$id");
		}
		else
		{
			echo "error";
		}
	}
	
	if(isset($_REQUEST['e_can']))
	{
		header("location:payment.php");
	}
	
	$d=date('d-m-Y');
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
		<div class="quotation"><center>Hotels/Vendor Payments Details</center></div>
        <div>
        <br />
        <table class="detail">
        <tr class="menu_header">
        <td width="90">Reciept</td>
        <td>Hotel</td>
        <td>Vendor</td>
        <td width="80">Date</td>
        <td width="180">Payment Mode</td>
        <td>Check No</td>
        <td width="120">Amount</td>
        </tr>
        <?php
		while($row_d=mysql_fetch_array($res_d))
		{
			echo "<tr class='pagi'>";
			echo "<td class='print'>";
			$row_r=mysql_fetch_array($res_r);
		
			if($row_r[9]=='H'.$row_d[0])
			{
				echo "<a href='viewreciept.php?id=$row_d[0]'>&nbsp;&nbsp;&nbsp;View&nbsp;&nbsp;&nbsp;</a>";
			}
			else
			{
				echo "<a href='viewreciept.php?id=$row_d[0]&&id2=$id2'>&nbsp;&nbsp;&nbsp;View&nbsp;&nbsp;&nbsp;</a>";
			}
			echo "</td>";
			echo "<td>";
			echo $row_d[3];
			echo "</td>";
			echo "<td>";
			echo $row_d[4];
			echo "</td>";
			echo "<td>";
			echo date('d-m-Y', strtotime($row_d[5]));
			echo "</td>";
			echo "<td>";
			echo $row_d[6];
			echo "</td>";
			echo "<td>";
			echo $row_d[7];
			echo "</td>";
			echo "<td>";
			echo $row_d[8].'&nbsp;'.'Rs/-';
			echo "</td>";
			echo "</tr>";
		}
		?>
        <tr class="menu_header">
        <td></td>
        <td></td>
        <td></td>
        <td width="50"></td>
        <td></td>
        <td>Total Amount</td>
        <td><?php echo $row_sum[0].'&nbsp;'.'Rs/-'; ?></td>
        </tr>
        
        </table>
        <form name="form1" action="" method="post">
        <table class="pay">
        <tr class="menu_header"><td colspan="2">Hotel/Vendor Payments</td></tr>
        <tr>
        <td class="l_form">Bkg No:</td>
        <td><input id="ename" type="text" readonly class="q_in" name="t1" value="<?php echo $row[2]; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">Hotel Name:</td>
        <td><input id="ename" type="text" class="q_in" name="t2" value="<?php echo $row[4]; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">Vendor Name:</td>
        <td><input id="ename" type="text" class="q_in" name="t3" value="<?php echo $row[3]; ?>"></td>
        </tr>
        
        <tr>
        <td class="l_form">Date:</td>
        <td><input id="des" type="text" class="q_in" name="t4" value="<?php echo $d; ?>"></td>
        </tr>
        
        <tr>
        <td class="l_form">Payment Mode:</td>
        <td>
        <select class="a" name="t5">
        <option>Cheque</option>
        <option>Cash</option>
        <option>Online Transfer</option>
        </select>
        </td>
        </tr>
        <tr>
        <td class="l_form">Check No:</td>
        <td><input id="contact" type="text" class="q_in" name="t6"></td>
        </tr>
        <tr>
        <td class="l_form">Pay Amount:</td>
        <td><input id="ename" type="text" class="q_in" name="t7" ></td>
        </tr>
        
        </table>
        <div class="pay_button">
         <input name="e_add" class="formbutton" value=" Add " type="submit"/>
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
