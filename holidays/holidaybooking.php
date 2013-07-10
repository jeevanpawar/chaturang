<?php
session_start(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];
error_reporting(0);
include("../include/database.php");
?>
<?php
	if(isset($_REQUEST['add']))
	{
		$date=$_POST['b_date'];
		$h1=date('Y-m-d', strtotime($date));
		$h2=$_POST['pax'];
		$h3=$_POST['adult'];
		$h4=$_POST['child'];
		$qry_h="insert booking_form(c_id,bkg_date,b_pax,b_adult,b_child) values('".$c."','".$h1."','".$h2."','".$h3."','".$h4."')";
		$res_h=mysql_query($qry_h);
		
		$d=$_POST['p_name'];
		$e = count($d);
		for($i=0; $i<$e; $i++)
		{
			$p1=$_POST['p_name'][$i];
			$p2=$_POST['p_dob'][$i];
			$bdate=date('Y-m-d', strtotime($p2));
			$p3=$_POST['p_contact'][$i];
			$p4=$_POST['p_email'][$i];
			$p5=$_POST['p_tamt'][$i];
			$p6=$_POST['p_namt'][$i]; 
			$qry_p="insert into pass_info(c_id,p_name,p_bdate,p_contact,p_email,p_tamt,p_namt) values('".$c."','".$p1."','".$bdate."','".$p3."','".$p4."','".$p5."','".$p6."')";
			$res_p=mysql_query($qry_p);
		}
		
		if($res_h)
		{
			header("location:journey.php");
		}
		else
		{
			echo "error";
		}
	}
	if(isset($_REQUEST['can']))
	{
		header("location:home.php");
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Holidays</title>

<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />

<script>
 var counter = 1;
 function add_phone_field()
 {
  var obj = document.getElementById("phone");
  var data = obj.innerHTML;
  data += "<table class='emp_tab'><tr class='emp_header'><td><input class='name' type='text' name='p_name["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='dob' type='text' name='p_dob["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='contact' type='text' name='p_contact["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='email' type='text' name='p_email["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='amt' type='text' name='p_tamt["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='amt' type='text' name='p_namt["+counter+"]' id='person_phone"+counter+"' /></td></tr></table>";
  obj.innerHTML = data;
  counter++;
  }
 </script>
</head>
<body>
<div id="container">
  <div id="sub-header">

	<?php
		include("include/p_header.php");
	?>  
<br />
		<div class="quotation"><center>Holiday Booking Form</center></div>
        <div>
        <form action="" method="post">
  		 <table class="h_booking">
         <tr>
         <td>Booking Date:-</td>
         <td><input class="q_in" name="b_date" type="text" value="<?php echo date('d-m-Y');?>"></td>
         <td>PAX:-</td>
         <td><input class="h_in" name="pax" type="text" ></td>
         <td>Adult:-</td>
         <td><input class="h_in" name="adult" type="text" ></td>
         <td>Child:-</td>
         <td><input class="h_in" name="child" type="text" ></td>
         </tr>
         </table>
         <span style=" margin-left:10px; color:#09C;font-size:16px;font-weight:bold;cursor:pointer;" onClick="add_phone_field()">[+]</span>
         <div class="quotation"><center>Passenger Information</center></div>
         <table class="emp_tab">
         <tr class="menu_header">
         <td>Passenger Name</td>
         <td>DOB</td>
         <td>Contact No</td>
         <td>Email</td>
         <td>T. Amount</td>
         <td>N. Amount</td>
         </tr>
         <tr class="emp_header">
         <td><input class="name" name="p_name[]" type="text"></td>
         <td><input class="dob" name="p_dob[]" type="text"></td>
         <td><input class="contact" name="p_contact[]" type="text"></td>
         <td><input class="email" name="p_email[]" type="text"></td>
         <td><input class="amt" name="p_tamt[]" type="text"></td>
         <td><input class="amt" name="p_namt[]" type="text"></td>
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
