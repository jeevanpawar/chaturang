<?php
session_start();
error_reporting(0);

include("../include/database.php");
$a=$_SESSION['user'];
$c=$_SESSION['com'];
	if(isset($_REQUEST['c_add']))
	{
	
	$c_t1=$_POST['c_fname'];
	$c_t2=$_POST['c_lname'];
	$c_t3=$_POST['c_address'];
	$c_t4=$_POST['c_city'];
	$c_t6=$_POST['c_pin'];
	$c_t7=$_POST['c_ph'];
	$c_t8=$_POST['c_mo'];
	$c_t9=$_POST['c_email'];
	$c_t10=$_POST['c_site'];
	$c_t11=$_POST['c_date'];
		
	$c_qry="insert into clients(c_date,c_first,c_last,c_add,c_city,c_pin,c_ph,c_mo,c_email,c_site) values('".$c_t11."','".$c_t1."','".$c_t2."','".$c_t3."','".$c_t4."','".$c_t6."','".$c_t7."','".$c_t8."','".$c_t9."','".$c_t10."')";
	$c_res=mysql_query($c_qry);
	if($c_res)
	{
		header("location:clients.php");
	}
	else
	{
		header("location:addclients.php");
	}
	}
	if(isset($_REQUEST['can']))
	{
		header("location:clients.php");
	}
?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript" language="javascript">
function validateMyForm ( ) { 
    var isValid = true;
    if ( document.form1.fname.value == "" ) 
	{ 
	    alert ( "Please enter First Name" ); 
	    isValid = false; 
    }
	    else if ( document.form1.lname.value == "") { 
            alert ( "please enter Last Name" ); 
            isValid = false;
		}
		 else if ( document.form1.address.value == "" ) { 
            alert ( "Please enter Address" ); 
            isValid = false;
    } 
	
		 else if ( document.form1.city.value == "" ) { 
            alert ( "Please enter City" ); 
            isValid = false;
    } 
	
		 else if ( document.form1.pin.value == "" ) { 
            alert ( "Please enter Pincode" ); 
            isValid = false;
    } 
	
		 else if ( document.form1.email.value == "" ) { 
            alert ( "Please enter Email Address" ); 
            isValid = false;
    } 
	
		 else if ( document.form1.ph.value == "" ) { 
            alert ( "Please enter Phone Number" ); 
            isValid = false;
    } 
	
		 else if ( document.form1.mo.value == "" ) { 
            alert ( "Please enter Mobile Number" ); 
            isValid = false;
    } 
    return isValid;
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
		<div class="quotation"><center>Add New Clients</center></div>
        <div>
        <form name="form1" action="" method="post">
        <table class="q_clients">
                <tr><td class="l_form">First Name:</td><td><input id="fname" class="q_in" type="text" name="c_fname" /></td></tr>
                <tr><td class="l_form">Last Name:</td><td><input id="lname" class="q_in" type="text" name="c_lname"/></td></tr>
                <tr><td class="l_form">Address:</td><td><textarea id="address" class="q_add" name="c_address"></textarea></td></tr>
                <tr><td class="l_form">City:</td><td><input id="city" class="q_in" type="text" name="c_city"/></td></tr>
				<tr><td class="l_form">Pin Code:</td><td><input id="pin" class="q_in" type="text" name="c_pin"/></td></tr>
                </table>
             
                <table class="q_clients2">
                <tr><td class="l_form">Email Id:</td><td><input id="email" class="q_in" type="text" name="c_email"/></td></tr>
             
                <tr><td class="l_form">Phone No:</td><td><input id="ph" class="q_in" type="text" name="c_ph"/></td></tr>
                <tr><td class="l_form">Mobile No:</td><td><input id="mo" class="q_in" type="text" name="c_mo"/></td></tr>
                
                <tr><td class="l_form">Date:</td><td><input class="q_in" type="text" name="c_date" value="<?php  echo date("d-m-Y"); ?>"/></td></tr>
                
                
                </table>
        <div class="update">
         <input name="c_add" class="formbutton" value=" Add " type="submit" onClick="javascript:return validateMyForm();" />
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
