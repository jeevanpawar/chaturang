<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$id=$_REQUEST['id'];

$qry_com="select * from company where comp_id='$c'";
$res_com=mysql_query($qry_com);
$row_com=mysql_fetch_array($res_com);

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
		$p_id=$row_com[2].'_'.$id4;

		$t1=$_POST['t1'];
 		$t2=$_POST['t2'];
		$date=date('Y-m-d', strtotime($t2));
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$num=$_POST['t5'];
		$t6=strtoupper(convertNumber($num));

		$pa_qry="insert into reciept(p_id,c_id,b_id,r_date,r_mode,r_no,r_amt,r_word) values('".$p_id."','".$c."','".$t1."','".$date."','".$t3."','".$t4."','".$t5."','".$t6."')";
		
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
		header("location:pay.php?id=$id");
	}
	
	$d=date('d-m-Y');
?>
<?php
function convertNumber($num)
{
   list($num, $dec) = explode(".", $num);

   $output = "";

   if($num{0} == "-")
   {
      $output = "negative ";
      $num = ltrim($num, "-");
   }
   else if($num{0} == "+")
   {
      $output = "positive ";
      $num = ltrim($num, "+");
   }
   
   if($num{0} == "0")
   {
      $output .= "zero";
   }
   else
   {
      $num = str_pad($num, 36, "0", STR_PAD_LEFT);
      $group = rtrim(chunk_split($num, 3, " "), " ");
      $groups = explode(" ", $group);

      $groups2 = array();
      foreach($groups as $g) $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});

      for($z = 0; $z < count($groups2); $z++)
      {
         if($groups2[$z] != "")
         {
            $output .= $groups2[$z].convertGroup(11 - $z).($z < 11 && !array_search('', array_slice($groups2, $z + 1, -1))
             && $groups2[11] != '' && $groups[11]{0} == '0' ? " and " : ", ");
         }
      }

      $output = rtrim($output, ", ");
   }

   if($dec > 0)
   {
      $output .= " point";
      for($i = 0; $i < strlen($dec); $i++) $output .= " ".convertDigit($dec{$i});
   }

   return $output;
}

function convertGroup($index)
{
   switch($index)
   {
      case 11: return " decillion";
      case 10: return " nonillion";
      case 9: return " octillion";
      case 8: return " septillion";
      case 7: return " sextillion";
      case 6: return " quintrillion";
      case 5: return " quadrillion";
      case 4: return " trillion";
      case 3: return " billion";
      case 2: return " million";
      case 1: return " thousand";
      case 0: return "";
   }
}

function convertThreeDigit($dig1, $dig2, $dig3)
{
   $output = "";

   if($dig1 == "0" && $dig2 == "0" && $dig3 == "0") return "";

   if($dig1 != "0")
   {
      $output .= convertDigit($dig1)." hundred";
      if($dig2 != "0" || $dig3 != "0") $output .= " and ";
   }

   if($dig2 != "0") $output .= convertTwoDigit($dig2, $dig3);
   else if($dig3 != "0") $output .= convertDigit($dig3);

   return $output;
}

function convertTwoDigit($dig1, $dig2)
{
   if($dig2 == "0")
   {
      switch($dig1)
      {
         case "1": return "ten";
         case "2": return "twenty";
         case "3": return "thirty";
         case "4": return "forty";
         case "5": return "fifty";
         case "6": return "sixty";
         case "7": return "seventy";
         case "8": return "eighty";
         case "9": return "ninety";
      }
   }
   else if($dig1 == "1")
   {
      switch($dig2)
      {
         case "1": return "eleven";
         case "2": return "twelve";
         case "3": return "thirteen";
         case "4": return "fourteen";
         case "5": return "fifteen";
         case "6": return "sixteen";
         case "7": return "seventeen";
         case "8": return "eighteen";
         case "9": return "nineteen";
      }
   }
   else
   {
      $temp = convertDigit($dig2);
      switch($dig1)
      {
         case "2": return "twenty-$temp";
         case "3": return "thirty-$temp";
         case "4": return "forty-$temp";
         case "5": return "fifty-$temp";
         case "6": return "sixty-$temp";
         case "7": return "seventy-$temp";
         case "8": return "eighty-$temp";
         case "9": return "ninety-$temp";
      }
   }
}
      
function convertDigit($digit)
{
   switch($digit)
   {
      case "0": return "zero";
      case "1": return "one";
      case "2": return "two";
      case "3": return "three";
      case "4": return "four";
      case "5": return "five";
      case "6": return "six";
      case "7": return "seven";
      case "8": return "eight";
      case "9": return "nine";
   }
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
       	<div>
        
        <table class="emp_tab">
        <tr class="search_res">
        <td class="info">
         <center>Payment Made By Client</center>
        </td>
        </tr>
        </table>
        <span class="bank"><a href="#" rel="popuprel" class="popup new">New Payment</a> </span>
        <br>
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
			echo "<a href='viewreciept.php?id=$row_d[0]'>&nbsp;&nbsp;&nbsp;View&nbsp;&nbsp;&nbsp;</a>";
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
			echo "<tr class='pagi'>";
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
        <div class="popupbox_pay" id="popuprel">
		<div id="intabdiv">
        <form name="" action="" method="post">
        <table class="pay">
        <tr><td colspan="2"><center>Client Payment</center></td></tr>
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
        <?php
		if($bal!= '0')
		{
		echo "<div class='pay_b'>";
        echo "<input name='e_add' value=' Add ' type='submit' />&nbsp;";
        echo "<input name='e_can' value='Cancel' type='submit' />";
        echo "</div>";
		}
		?>
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
