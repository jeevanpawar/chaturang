<?php
session_start(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];
error_reporting(0);
include("../include/database.php");
if(isset($_REQUEST['id']))
{
	session_destroy();
	header("location:../index.php");
}
?>
<?php
	if(isset($_REQUEST['add']))
	{
		$a=$_POST['v_name'];
		$b = count($a);
		for($i=0; $i<$b; $i++)
		{
			$v1=$_POST['v_name'][$i];
			$v2=$_POST['v_type'][$i];
			$v3=$_POST['p_date'][$i];
			$d3=date('Y-m-d', strtotime($v3));
			$v4=$_POST['p_point'][$i];
			$v5=$_POST['d_date'][$i];
			$d5=date('Y-m-d', strtotime($v5));
			$v6=$_POST['d_point'][$i];
			$v7=$_POST['days'][$i];
			$v8=$_POST['amt'][$i];
			$v9=$_POST['pay'][$i];
				
			$qry_v="insert into vehicle_transportation(c_id,v_name,v_type,v_pdate,v_ppoint,v_ddate,v_dpoint,v_days,v_amt,v_pay) values('".$c."','".$v1."','".$v2."','".$d3."','".$v4."','".$d5."','".$v6."','".$v7."','".$v8."','".$v9."')";
			
			$res_v=mysql_query($qry_v);
		
		if($res_v)
		{
		 header("location:tours.php");
		}
		else
		{
			echo "error";
		}
		}
	}
	if(isset($_REQUEST['can']))
	{
		header("location:tours.php");
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang | Tours</title>

<link rel="stylesheet" href="../styles2.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />

<script>
 var counter = 1;
 function add_phone_field()
 {
  var obj = document.getElementById("phone");
  var data = obj.innerHTML;
  data += "<table class='emp_tab'><tr class='emp_header'><td><input class='from' type='text' name='v_name["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='dob' type='text' name='v_type["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='ci' type='text' name='p_date["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='ci' type='text' name='p_point["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='ci' type='text' name='d_date["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='ci' type='text' name='d_point["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='ci' type='text' name='days["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='pax' type='text' name='amt["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='pax' type='text' name='pay["+counter+"]' id='person_phone"+counter+"' /></td></tr></table>";
  obj.innerHTML = data;
  counter++;
  }
 </script>
</head>
<body>
<div id="container">
    <div id="sub-header">
    <?php
		include("include/t_header.php");	
	?>

   	<br />
 		<div class="quotation"><center>Vehicle Transportation Detail</center></div>
        <div>
        <form action="" method="post">
         <span style=" margin-left:12px; color:#09F;font-size:15px;font-weight:bold;cursor:pointer;" onClick="add_phone_field()">[+]</span>
         <table class="emp_tab">
         <tr class="menu_header">
         <td>Vendor's Name</td>
         <td>Vehicle Type</td>
         <td>Pick Up</td>
         <td>point</td>
         <td>Drop</td>
         <td>Point</td>
         <td>Days</td>
         <td>Amt</td>
         <td>Payment</td>
         </tr>
         <tr class="emp_header">
         <td><input class="from" name="v_name[]" type="text"></td>
         <td><input class="dob" name="v_type[]" type="text"></td>
         <td><input class="ci" name="p_date[]"type="text"></td>
         <td><input class="ci" name="p_point[]" type="text"></td>
         <td><input class="ci" name="d_date[]" type="text"></td>
         <td><input class="ci" name="d_point[]" type="text"></td>
         <td><input class="ci" name="days[]" type="text"></td>
         <td><input class="pax" name="amt[]" type="text"></td>
         <td><input class="pax" name="pay[]" type="text"></td>
         </tr>
         </table>
         <div id="phone">
                
         </div>     
        <div class="addclients_b">
         <input name="add" class="formbutton" value=" Add " type="submit" />
         <input name="can" class="formbutton" value="Cancel" type="submit" />
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
