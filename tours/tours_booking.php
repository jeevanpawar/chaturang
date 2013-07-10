<?php
session_start(0);

$a=$_SESSION['user'];
$c=$_SESSION['com'];
error_reporting(0);

include("../include/database.php");

if(isset($_REQUEST['id']))
{
	session_destroy();
	header("location:index.php");
}

?>

<?php
	if(isset($_REQUEST['add']))
	{
		$date=$_POST['b_date'];
		$t1=date('Y-m-d', strtotime($date));
		$t2=$_POST['se'];
		$t3=$_POST['office'];
		$t4=$_POST['pax'];
		$t5=$_POST['adult'];
		$t6=$_POST['child'];
		$qry_b="insert into booking_form(c_id,bkg_date,b_se,b_office,b_pax,b_adult,b_child) values('".$c."','".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."')";
		$res_b=mysql_query($qry_b);
		
		$a=$_POST['p_name'];
		$b = count($a);
		for($i=0; $i<$b; $i++)
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
		if($res_b)
		{
			header("location:t_accommdation.php");
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
<title>Chaturang | Tours</title>

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
		include("include/t_header.php");	
	?>
    
  
    	<br />
        
        <div>
        <form action="" method="post">
  		 <table class="tab1">
         <tr>
         <td>Bkg Date:-</td>
         <td><input class="dob" name="b_date" type="text" value="<?php echo date('d-m-Y');?>"></td>
         </tr>
         <tr>
         <td>SE:-</td>
         <td><input class="se" name="se" type="text" ></td>
         </tr>
         <tr>
         <td>Office:-</td>
         <td><input class="se" name="office" type="text" ></td>
         </tr>
         </table>
         <table class="tab2">
         <tr>
         <td>PAX:-</td>
         <td><input class="pax" name="pax" type="text" ></td>
         </tr>
         <tr>
         <td>Adult:-</td>
         <td><input class="pax" name="adult" type="text" ></td>
         </tr>
         <tr>
         <td>Child:-</td>
          <td><input class="pax" name="child" type="text" ></td>
         </tr>
         </table>
         
         <br><br>
         <span style=" margin-left:12px; color:#09F;font-size:15px;font-weight:bold;cursor:pointer;" onClick="add_phone_field()">[+]</span>
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
</body>
</html>
