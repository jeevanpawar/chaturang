<?php
	error_reporting(0);
	include("include/database.php");
	$up=$_REQUEST['id'];
	$up_qry="select * from reminder where r_id=".$up;
	$up_res=mysql_query($up_qry);
	$row_up=mysql_fetch_array($up_res);
	
	if(isset($_REQUEST['e_can']))
	{
		header("location:home.php");
	}
	
	if(isset($_REQUEST['e_up']))
	{	
		$up_r=$_REQUEST['id'];
		$t1=$_POST['r_date'];
		
		$qry_up="update reminder SET r_date='".$t1."' where r_id=".$up_r;
		$res_up=mysql_query($qry_up);
		if($res_up)
		{
			header("location:home.php");
		}
		else
		{
			echo "error";
		}
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Anmol Water Tank Cleaners</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>
<div id="container">
	
    <?php
	include("header.php");
	?>
    
    <div id="sub-header">
    <div class="quo">
    	<br />
		<div class="quotation"><center>Reminder Update</center></div>
        <div>
        <form action="" method="post">
        <table class="addemp_re">
        <tr>
        <td class="l_form">Invoice No:</td>
        <td><input type="text" class="q_in" name="eu_name" value="<?php echo $row_up[1]; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">Client Name:</td>
        <td><input type="text" class="q_in" name="eu_name" value="<?php echo $row_up[2]; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">Date:</td>
        <td><input type="text" class="q_in" name="r_date" value="<?php echo $row_up[4]; ?>"></td>
        </tr>
        
        </div>
        </table>
        <div class="addemp_r">
         <input name="e_up" class="formbutton" value=" Update " type="submit" />
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
