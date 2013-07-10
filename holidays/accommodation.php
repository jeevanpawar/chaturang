<?php
session_start();

$a=$_SESSION['user'];
$c=$_SESSION['com'];
$d=$_SESSION['booking'];

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
			$d=$_SESSION['booking'];
			$h1=$_POST['v_name'][$i];
			$h2=$_POST['h_name'][$i];
			$h3=$_POST['place1'][$i];
			$h4=$_POST['room1'][$i];
			$h5=$_POST['meal1'][$i];
			$h6=$_POST['cin1'][$i];
			$d6=date('Y-m-d', strtotime($h6));
			$h7=$_POST['cout1'][$i];
			$d7=date('Y-m-d', strtotime($h7));
			$qry_hotel="insert into hotel_acomodation(c_id,b_id,h_vendor,h_hotel,h_place,h_room,h_meal,h_cin,h_cout) values('".$c."','".$d."','".$h1."','".$h2."','".$h3."','".$h4."','".$h5."','".$d6."','".$d7."')";
			$res_hotel=mysql_query($qry_hotel);
		
			if($res_hotel)
			{
				header("location:vehicle_trans.php");
			}
			else
			{
				echo "error";
			}
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

<script>
 var counter = 1;
 function add_phone_field()
 {
  var obj = document.getElementById("phone");
  var data = obj.innerHTML;
  data += "<table class='emp_tab'><tr class='emp_header'><td><input class='from' type='text' name='v_name["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='dob' type='text' name='h_name["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='ci' type='text' name='place1["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='ci' type='text' name='room1["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='ci' type='text' name='meal1["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='ci' type='text' name='cin1["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='ci' type='text' name='cout1["+counter+"]' id='person_phone"+counter+"' /></td></tr></table>";
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
	<div class="quotation"><center>Hotel Accommodation Detail</center></div>
        <div>
        <form action="" method="post">
	      <span style=" margin-left:12px; color:#09F;font-size:15px;font-weight:bold;cursor:pointer;" onClick="add_phone_field()">[+]</span>
         <table class="emp_tab">
         <tr class="menu_header">
        
         <td>Vendor's Name</td>
         <td>Hotel Name</td>
         <td>Place</td>
         <td>Room</td>
         <td>Meal PLN</td>
         <td>C/I</td>
         <td>C/O</td>
         </tr>
         <tr class="emp_header">
         <td><input class="from" name="v_name[]" type="text"></td>
         <td><input class="dob" name="h_name[]" type="text"></td>
         <td><input class="ci" name="place1[]" type="text"></td>
         <td><input class="ci" name="room1[]" type="text"></td>
         <td><input class="ci" name="meal1[]" type="text"></td>
         <td><input class="ci" name="cin1[]" type="text"></td>
         <td><input class="ci" name="cout1[]" type="text"></td>
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
