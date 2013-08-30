<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$i=$_REQUEST['id_a'];

$qry_booking="select * from booking_form where b_id='$i' and c_id='$c'";
$res_booking=mysql_query($qry_booking);

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
			$cnt=$i+1;
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
			$qry_hotel="insert into hotel_acomodation(c_id,b_id,h_vendor,h_hotel,h_place,h_room,h_meal,h_cin,h_cout,cnt) values('".$c."','".$id."','".$h1."','".$h2."','".$h3."','".$h4."','".$h5."','".$d6."','".$d7."','".$cnt."')";
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

$qry_aco="select * from hotel_acomodation where c_id='$c' and b_id='$i'";
$res_aco=mysql_query($qry_aco);
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
    <div>
        <table class="pre">
        <tr class="menu_header">
        <td width="110">B.No</td>
        <td width="110">B.Date</td>
        <td width="300">SE</td>
        <td>Client Name</td>
        <td width="50">Adult</td>
        <td width="50">Child</td>
        <td width="50">Pax</td>
        <td width="50">Room</td>
        <td width="50">Bed</td>
        <td width="100">Total Amt</td>
        </tr>
        <?php
		while($row_booking=mysql_fetch_array($res_booking))
		{
			echo "<tr class='pagi'>";
			echo "<td>";
			echo $row_booking['b_id'];
			echo "</td>";
			echo "<td>";
			echo date('d-m-Y', strtotime($row_booking['bkg_date']));
			echo "</td>";
			echo "<td>";
			echo $row_booking['b_se'];
			echo "</td>";
			echo "<td>";
			echo $row_booking['b_office'];
			echo "</td>";
			echo "<td>";
			echo $row_booking['b_adult'];
			echo "</td>";
			echo "<td>";
			echo $row_booking['b_child'];
			echo "</td>";
			echo "<td>";
			echo $row_booking['b_pax'];
			echo "</td>";
			echo "<td>";
			echo $row_booking['b_room'];
			echo "</td>";
			echo "<td>";
			echo $row_booking['b_bed'];
			echo "</td>";
			echo "<td>";
			echo $row_booking['b_total_amt'];
			echo "</td>";
			echo "</tr>";
		}
		?>
        </table>
        <table class="emp_tab">
         <tr class="menu_header">
         <td width="22%">Vendor's Name</td>
         <td width="15%">Hotel Name</td>
         <td width="10%">Place</td>
         <td width="10%">Room</td>
         <td width="10%">Meal PLN</td>
         <td width="15%">C/I</td>
         <td width="15%">C/O</td>
         <td>Update</td>
         </tr>
         </table>
         <table class="emp_tab">
         <?php
		 while($row_aco=mysql_fetch_array($res_aco))
		 {
         echo "<tr>";
         echo "<td width='22%'><input class='name' type='text' value='$row_aco[3]'></td>";
         echo "<td width='15%'><input type='text' class='mf' value='$row_aco[4]'></td>";
         echo "<td width='10%'><input class='amt' type='text' value='$row_aco[5]'></td>";
         echo "<td width='10%'><input class='amt' type='text' value='$row_aco[6]'></td>";
         echo "<td width='10%'><input class='contact' type='text' value='$row_aco[7]'></td>";
         echo "<td width='15%'><input class='email' type='text' value='$row_aco[9]'></td>";
		 echo "<td width='15%'><input class='email' type='text' value='$row_aco[10]'></td>";
		 echo "<td class='insert'><a href=''>Update</a></td>";
         echo "</tr>";
		 }
		 ?>
         </table>
        </div>
    <br />
    <form action="" method="post">
	<div class="quotation"><center>Hotel Accommodation Detail</center></div>
		 <div class="adddel1">
         <input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
		 <input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         </div>

        <div>
        
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
