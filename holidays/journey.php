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
		$d=$_POST['from'];
		$e = count($d);
		for($i=0; $i<$e; $i++)
		{
			$j1=$_POST['from'][$i];
			$j2=$_POST['to'][$i];
			$j3=$_POST['air'][$i];
			$j4=$_POST['flight'][$i];
			$j5=$_POST['pnr'][$i];
			$j6=$_POST['yt'][$i];
			
			$qry_j="insert into journey(c_id,j_from,j_to,j_airline,j_fno,j_pnr,j_yt) values('".$c."','".$j1."','".$j2."','".$j3."','".$j4."','".$j5."','".$j6."')";
			
			$res_j=mysql_query($qry_j);
		
			if($res_j)
			{
				header("location:holiday.php");
			}
			else
			{
				echo "error";
			}
		}		
	}
	
	if(isset($_REQUEST['can']))
	{
		header("location:holiday.php");
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
  data += "<table class='emp_tab'><tr class='emp_header'><td><input class='from' type='text' name='from["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='from' type='text' name='to["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='from' type='text' name='air["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='amt' type='text' name='flight["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='amt' type='text' name='pnr["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='amt' type='text' name='yt["+counter+"]' id='person_phone"+counter+"' /></td></tr></table>";
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
		<div class="quotation"><center>Journey Details</center></div>
        <div>
        <form action="" method="post">
  		 
         <span style=" margin-left:10px; color:#00f;font-size:20px;font-weight:bold;cursor:pointer;" onClick="add_phone_field()">[+]</span>
         <table class="emp_tab">
         <tr class="menu_header">
         <td>From</td>
         <td>To</td>
         <td>Airline</td>
         <td>Flight No</td>
         <td>Air PNR</td>
         <td>YT No</td>
         </tr>
         <tr class="emp_header">
         <td><input class="from" name="from[]" type="text"></td>
         <td><input class="from" name="to[]" type="text"></td>
         <td><input class="from" name="air[]" type="text"></td>
         <td><input class="amt" name="flight[]" type="text"></td>
         <td><input class="amt" name="pnr[]" type="text"></td>
         <td><input class="amt" name="yt[]" type="text"></td>
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
