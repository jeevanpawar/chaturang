<?php
session_start();
error_reporting(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
include("../include/database.php");
?>

<?php
	if(isset($_REQUEST['add']))
	{
		$i=$_REQUEST['id_a'];
		$o='1';
		$qry_up="update booking_form SET b_hotel='".$o."' where b_id='$i'";
		$res_up=mysql_query($qry_up);
		$d=$_POST['v_name'];
		$b = count($d);
		for($i=0; $i<$b; $i++)
		{
			$id=$_REQUEST['id_a'];
		    $h1=$_POST['v_name'][$i];
			$h2=$_POST['h_name'][$i];
			$h3=$_POST['place1'][$i];
			$h4=$_POST['room1'][$i];
			$h5=$_POST['meal1'][$i];
			$h6=$_POST['cin1'][$i];
			$d6=date('Y-m-d', strtotime($h6));
			$h7=$_POST['cout1'][$i];
			$d7=date('Y-m-d', strtotime($h7));
			$qry_hotel="insert into hotel_acomodation(c_id,b_id,h_vendor,h_hotel,h_place,h_room,h_meal,h_cin,h_cout) values('".$c."','".$id."','".$h1."','".$h2."','".$h3."','".$h4."','".$h5."','".$d6."','".$d7."')";
			$res_hotel=mysql_query($qry_hotel);
		
			if($res_hotel)
			{
				header("location:booking.php");
			}
			else
			{
				echo "error";
			}
		}		
	}
	if(isset($_REQUEST['can']))
	{
		header("location:booking.php");
	}
?>
<?php
$res=mysql_query("select * from hotel");
$ress=mysql_query("select * from hotel");

$res_r=mysql_query("select * from room_type");
$res_rs=mysql_query("select * from room_type");

$res_m=mysql_query("select * from meal");
$res_ms=mysql_query("select * from meal");

?>

<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript">
function addRow(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            var colCount = table.rows[0].cells.length;
            for(var i=0; i<colCount; i++) {
                var newcell = row.insertCell(i);
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
		
				function deleteRow(tableID)
{
            try
                 {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;
                    for(var i=0; i<rowCount; i++)
                        {
                        var row = table.rows[i];
                        var chkbox = row.cells[0].childNodes[0];
                        if (null != chkbox && true == chkbox.checked)
                            {
                            if (rowCount <= 1)
                                {
                                alert("Cannot delete all the rows.");
                                break;
                                }
                            table.deleteRow(i);
                            rowCount--;
                            i--;
                            }
                        }
                    } catch(e)
                        {
                        alert(e);
                        }
   getValues();
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
		 <div class="adddel">
         <input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
		 <input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         </div>

        <div>
        <form action="" method="post">
         <table class="emp_tab">
         <tr class="menu_header">
         <td width="2%">S</td>
         <td width="22%">Vendor's Name</td>
         <td width="15%">Hotel Name</td>
         <td width="10%">Place</td>
         <td width="10%">Room</td>
         <td width="10%">Meal PLN</td>
         <td width="15%">C/I</td>
         <td width="15%">C/O</td>
         </tr>
         </table>
         <table class="emp_tab" id="dataTable">
         <tr>
         <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
         <td width="22%"><input class="from" name="v_name[]" type="text"></td>
         <td width="15%">
         <select name="h_name[]" class="hotel">
         <?php
		 while($row=mysql_fetch_array($res))
		 {
			 echo "<option>";
			 echo $row[2];
			 echo "</option>";
		 }
		 ?>
         </select>
         </td>
         <td width="10%"><input class="ci" name="place1[]" type="text"></td>
         <td width="10%">
         <select name="room1[]" class="hotel">
         <?php
		 while($row_r=mysql_fetch_array($res_r))
		 {
			 echo "<option>";
			 echo $row_r[1];
			 echo "</option>";
		 }
		 ?>
         </select>
         </td>
         <td width="10%">
         <select name="meal1[]" class="hotel">
         <?php
		 while($row_m=mysql_fetch_array($res_m))
		 {
			 echo "<option>";
			 echo $row_m[1];
			 echo "</option>";
		 }
		 ?>
         </select>
         </td>
         <td width="15%"><input class="ci" name="cin1[]" type="date"></td>
         <td width="15%"><input class="ci" name="cout1[]" type="date"></td>
         </tr>
         </table>
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
