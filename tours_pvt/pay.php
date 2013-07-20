<?php
session_start();
$a=$_SESSION['user'];
$c=$_SESSION['com'];
error_reporting(0);

include("../include/database.php");
$id=$_REQUEST['id'];
$qry="select * from booking_form where b_id='$id'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$qry_d="select * from partial_payment where b_id='$id'";
$res_d=mysql_query($qry_d);

$qry_sum="select SUM(p_amt) from partial_payment where b_id='$id'";
$res_sum=mysql_query($qry_sum);
$row_sum=mysql_fetch_array($res_sum);

$bal=$row[8]-$row_sum[0];

$qry_r="select * from reciept where b_id='$id'";
$res_r=mysql_query($qry_r);
	if(isset($_REQUEST['e_add']))
	{
 		$t1=$_POST['t1'];
 		$t2=$_POST['t2'];
		$date=date('Y-m-d', strtotime($t2));
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$pa_qry="insert into partial_payment(c_id,b_id,p_date,p_mode,p_check,p_amt) values('".$c."','".$t1."','".$date."','".$t3."','".$t4."','".$t5."')";
		$pa_res=mysql_query($pa_qry);
		$id4 = mysql_insert_id();
		$m_id='CP1_'.$id4;

		$t1=$_POST['t1'];
 		$t2=$_POST['t2'];
		$date=date('Y-m-d', strtotime($t2));
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];

		$pa_qry="insert into reciept(p_id,c_id,b_id,r_date,r_mode,r_no,r_amt,m_id) values('".$id4."','".$c."','".$t1."','".$date."','".$t3."','".$t4."','".$t5."','".$m_id."')";
		
		$pa_res=mysql_query($pa_qry);
		
		if($pa_res)
		{
			header("location:pay.php?id=$id");
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
		<div class="quotation"><center>Payment Made By Client</center></div>
        <div>
        <br />
        <table class="detail">
        <tr class="menu_header">
        <td width="90">Reciept</td>
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
			if($row_r[9]=='C'.$row_d[0])
			{
				echo "<a href='viewreciept.php?id=$row_d[0]'>&nbsp;&nbsp;&nbsp;View&nbsp;&nbsp;&nbsp;</a>";
			}
			else
			{
				echo "<a href='viewreciept.php?id=$row_d[0]'>&nbsp;&nbsp;&nbsp;View&nbsp;&nbsp;&nbsp;</a>";
			}
			echo "</td>";
			echo "<td>";
			echo date('d-m-Y', strtotime($row_d[4]));
			echo "</td>";
			echo "<td>";
			echo $row_d[3];
			echo "</td>";
			echo "<td>";
			echo $row_d[5];
			echo "</td>";
			echo "<td>";
			echo $row_d[6].'&nbsp;'.'Rs/-';
			echo "</td>";
			echo "</tr>";
		}
		?>
        <tr class="pagi">
        <td></td>
        <td width="50"></td>
        <td></td>
        <td>Total Amount</td>
        <td><?php echo $row_sum[0].'&nbsp;'.'Rs/-'; ?></td>
        </tr>
        <tr class="pagi">
        <td></td>
        <td width="50"></td>
        <td></td>
        <td>Booking Amount</td>
        <td><?php echo $row[8].'&nbsp;'.'Rs/-'; ?></td>
        </tr>
        <?php
		if($bal!= '0')
		{
			echo "<tr class='menu_header'>";
			echo "<td></td>";
			echo "<td width='50'></td>";
			echo "<td></td>";
			echo "<td>Balance</td>";
			echo "<td>$bal&nbsp;Rs/-</td>";
			echo "</tr>";
		}
		?>
		<?php
        if($bal == '0')
		{
		echo "<tr class='header'>";
        echo "<td colspan='5'>Payment dues has cleared by Clients</td>";
        echo "</tr>";
		}
		?>
        </table>
        <form name="form1" action="" method="post">
        <table class="pay">
        <tr class="menu_header"><td colspan="2">Client Payment</td></tr>
        <tr>
        <td class="l_form">Bkg No:</td>
        <td><input id="ename" type="text" readonly class="q_in" name="t1" value="<?php echo $id; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">Date:</td>
        <td><input id="des" type="text" class="q_in" name="t2" value="<?php echo $d; ?>"></td>
        </tr>
        
        <tr>
        <td class="l_form">Payment Mode:</td>
        <td>
        <select class="a" name="t3" onChange="display(this,'text','image');">
        <option name="image">Cheque</option>
        <option name="text">Cash</option>
        <option name="invisible">Online Transfer</option>
        </select>
        </td>
        </tr>
       
		
        <tr>
        <td class="l_form">Check No:</td>
        <td><input id="contact" type="text" class="q_in" name="t4"></td>
        </tr>
        
        <tr>
        <td class="l_form">Booking Amount:</td>
        <td><input id="ename" type="text" readonly class="q_in" value="<?php echo $row[8]; ?>"></td>
        </tr>
        <?php
		if($bal!= '0')
		{
        echo "<tr>";
        echo "<td class='l_form'>Amount:</td>";
        echo "<td><input id='i_amt' type='text' class='q_in' name='t5' value='$bal'></td>";
        echo "</tr>";
		}
		?>
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
