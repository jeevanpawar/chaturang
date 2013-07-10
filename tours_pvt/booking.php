<?php
session_start();
error_reporting(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];
include("../include/database.php");

?>
<?php
if(isset($_REQUEST['b']))
{
$result4 = mysql_query("SELECT * FROM `inv` ORDER BY id desc") or die('could not select');   //Select last transaction
$row4 = mysql_fetch_array($result4);
$invoice4 = $row4['invoice_number'];
$inc_number = $row4['inc_number'];
$year = $row4['year'];
//Setting Invoice Format
$brand = 'Ch';
$cur_date = date('y');  // date('y')
$invoice = $brand.$cur_date.'00001';
$customer_id = rand(5487 , 9854);
if($cur_date == $year) {   //if current year equal to last year in transaction 
    if($invoice4 == $invoice && $inc_number == '1') {
        //IF EXIST 
        //add inc_number 
        $inc_number_add = $inc_number + 1; // Increment by 1
        //invoice_number
        $inc = str_pad($inc_number_add, 9999, '0', STR_PAD_LEFT); //Format with leading 0 eg: 00001
        $invoice_number_db = $brand.$cur_date.$inc;
        //create new order
        mysql_query("INSERT INTO `inv` (customer_id,invoice_number,inc_number,year) VALUES ($customer_id, '$invoice_number_db' ,$inc_number_add,$cur_date)") 
        or die('Cannot Insert into database!');
	    }
    else {
        //IF NOT EXIST 
            mysql_query("INSERT INTO `inv` (customer_id,year) VALUES ($customer_id,$cur_date)") or die('Cannot Insert into database!');

            // Retrieve data again after create
            $result = mysql_query("SELECT * FROM `inv` WHERE customer_id='$customer_id'") or die('could not select');         $row = mysql_fetch_array($result);
            //var
            $id_val = $row['id'];
            $inc_number_add = $inc_number + 1;  // Increment by 1
            $inc = str_pad($inc_number_add, 9999, '0', STR_PAD_LEFT); //Format with leading 0 eg: 00001
            $invoice = $brand.$cur_date.$inc;

            //Update invoice
            mysql_query("UPDATE `inv` SET invoice_number='$invoice' , inc_number='$inc_number_add' WHERE customer_id=$customer_id") or die('error 89');
    }

}
    else {

        //IF TODAY IS NEW YEAR RESET INVOICE NUMBER
        mysql_query("INSERT INTO `inv` (customer_id,invoice_number,inc_number,year) VALUES ($customer_id, '$invoice' , '1' ,$cur_date)") 
        or die('Cannot Insert into database!');

    }

        $result_3 = mysql_query("SELECT * FROM `inv` WHERE customer_id='$customer_id' ") or die('could not select');		$row_3 = mysql_fetch_array($result_3);
        $invoice3 = $row_3['invoice_number'];
		$year3 = $row_3['year'];

            
}
?>
<?php
	if(isset($_REQUEST['add']))
	{
		$t0=$_POST['b_no'];
		$_SESSION['booking']=$t0;
		$date=$_POST['b_date'];
		$t1=date('Y-m-d', strtotime($date));
		$t2=$_POST['se'];
		$t3=$_POST['office'];
		$t4=$_POST['pax'];
		$t5=$_POST['adult'];
		$t6=$_POST['child'];
		$t7=$_POST['amt']; 
		$qry_b="insert into booking_form(b_id,c_id,bkg_date,b_se,b_office,b_pax,b_adult,b_child,b_total_amt) values('".$t0."','".$c."','".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."','".$t7."')";
		$res_b=mysql_query($qry_b);
		
		$a=$_POST['p_name'];
		$b = count($a);
		for($i=0; $i<$b; $i++)
		{
			$p0=$_POST['b_no'];
			$p1=$_POST['p_name'][$i];
			$p2=$_POST['p_mf'][$i];
			$p3=$_POST['p_age'][$i];
			$p4=$_POST['p_bdate'][$i];
			$bdate=date('Y-m-d', strtotime($p4));
			$p5=$_POST['p_contact'][$i];
			$p6=$_POST['p_email'][$i];
			
			$qry_p="insert into pass_info(c_id,b_id,p_name,p_mf,p_age,p_bdate,p_contact,p_email) values('".$c."','".$p0."','".$p1."','".$p2."','".$p3."','".$bdate."','".$p5."','".$p6."')";
			$res_p=mysql_query($qry_p);
		}
		if($res_b)
		{
			header("location:accommodation.php");
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
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
	$( "#db" ).datepicker();
  });
  </script>
<script>
 var counter = 1;
 function add_phone_field()
 {
  var obj = document.getElementById("phone");
  var data = obj.innerHTML;
  data += "<table class='emp_tab'><tr class='emp_header'><td><input class='name' type='text' name='p_name["+counter+"]' id='person_phone"+counter+"' /></td><td><select class='mf' name='p_mf["+counter+"]' id='person_phone"+counter+"'><option>Male</option><option>Female</option></select></td><td><input class='amt' type='text' name='p_age["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='amt' type='text' name='p_bdate["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='contact' type='text' name='p_contact["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='email' type='text' name='p_email["+counter+"]' id='person_phone"+counter+"' /></td></tr></table>";
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
        <div>
        <div class="quotation"><center>Booking Form</center></div>
        <form action="" method="post">
  		 <table class="tab1">
         <tr>
         <td><input type="submit" name="b" value="Booking No"></td>
         <td><input class="dob" name="b_no" readonly type="text" value="<?php echo 'CH'.$year3.'0'.$inc_number; ?>">
         </td>
         </tr>
         <td>Bkg Date:-</td>
         <td><input class="dob" name="b_date" id="datepicker" type="text" value=""></td>
         </tr>
         <tr>
         <td>SE:-</td>
         <td><input class="dob" name="se" type="text" ></td>
         </tr>
         <tr>
         <td>Office:-</td>
         <td><input class="dob" name="office" type="text" ></td>
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
         <tr>
         <td>Bkg Amount:-</td>
          <td><input class="pax" name="amt" type="text" ></td>
         </tr>
         </table>
         
         <br><br>
         <span style=" margin-left:12px; color:#09F;font-size:15px;font-weight:bold;cursor:pointer;" onClick="add_phone_field()">[+]</span>
         <div class="quotation"><center>Passenger Information</center></div>
         <table class="emp_tab">
         <tr class="menu_header">
         
         <td>Tourists Name</td>
         <td>M/F</td>
         <td>Age</td>
         <td>DOB</td>
         <td>Contact No</td>
         <td>Email</td>
         </tr>
         <tr class="emp_header">
         <td><input class="name" name="p_name[]" type="text"></td>
         <td><select name="p_mf[]" class="mf"><option>Male</option><option>Female</option></select></td>
         <td><input class="amt" name="p_age[]" type="text"></td>
         <td><input id="db" class="amt" name="p_bdate[]" type="text"></td>
         <td><input class="contact" name="p_contact[]" type="text"></td>
         <td><input class="email" name="p_email[]" type="text"></td>
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
