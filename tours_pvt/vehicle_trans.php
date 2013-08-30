<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
?>
<?php
	$i=$_REQUEST['id_v'];
	if(isset($_REQUEST['add']))
	{
		$i=$_REQUEST['id_v'];
		$o='1';
		$qry_up="update booking_form SET b_vehicle='".$o."' where b_id='$i'";
		$res_up=mysql_query($qry_up);
		
		$d=$_POST['v_name'];
		$b = count($d);
		for($i=0; $i<$b; $i++)
		{
			$id=$_REQUEST['id_v'];
			$v1=$_POST['v_name'][$i];
			$v2=$_POST['v_type'][$i];
			$v3=$_POST['p_date'][$i];
			$d3=date('Y-m-d', strtotime($v3));
			$v4=$_POST['p_point'][$i];
			$v5=$_POST['d_date'][$i];
			$d5=date('Y-m-d', strtotime($v5));
			$v6=$_POST['d_point'][$i];
			$v7=$_POST['days'][$i];
			$qry_v="insert into vehicle_transportation(c_id,b_id,v_name,v_type,v_pdate,v_ppoint,v_ddate,v_dpoint,v_days) values('".$c."','".$id."','".$v1."','".$v2."','".$d3."','".$v4."','".$d5."','".$v6."','".$v7."')";
			
			$res_v=mysql_query($qry_v);
		
		if($res_v)
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


$res_v=mysql_query("select * from vehicle");
$res_vs=mysql_query("select * from vehicle");

$qry_booking="select * from booking_form where b_id='$i' and c_id='$c'";
$res_booking=mysql_query($qry_booking);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="css/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        
      })
    })
  </script>

<script type="text/javascript">
$('#pdate').change(function () {
    var date1 = new Date($(this).val());
    var date2 = new Date();
    var diffDays = date2.getDate() - date1.getDate();
    $('body').append('<div id="' + diffDays + '">' + diffDays + '</div>');
});
</script>
</head>
<body>
<div id="container">
<div id="sub-header">
    <?php
		include("include/p_header.php");	
	?>
       	<br />
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
		<?php
		$qry_aco="select * from vehicle_transportation where c_id='$c' and b_id='$i'";
		$res_aco=mysql_query($qry_aco);
		?>
        <table class="emp_tab">
         <tr class="menu_header">
         <td width="25%">Vendor's Name</td>
         <td width="15%">Vehicle Type</td>
         <td width="15%">Pick Up Date</td>
         <td width="10%">P.Point</td>
         <td width="15%">Drop Date</td>
         <td width="10%">D.Point</td>
         <td width="8%">Days</td>
         <td>Update</td>
         </tr>
         </table>
         <table class="emp_tab">
         <?php
		 while($row_aco=mysql_fetch_array($res_aco))
		 {
         echo "<tr>";
         echo "<td width='25%'><input class='name' type='text' value='$row_aco[3]'></td>";
         echo "<td width='15%'><input type='text' class='mf' value='$row_aco[4]'></td>";
         echo "<td width='15%'><input class='amt' type='text' value='$row_aco[5]'></td>";
         echo "<td width='10%'><input class='amt' type='text' value='$row_aco[6]'></td>";
         echo "<td width='15%'><input class='contact' type='text' value='$row_aco[7]'></td>";
         echo "<td width='10%'><input class='email' type='text' value='$row_aco[9]'></td>";
		 echo "<td width='8%'><input class='email' type='text' value='$row_aco[10]'></td>";
		 echo "<td class='update'><a rel='facebox' href='vehicleup.php?id5=$row_aco[0]'>Update</a></td>";
         echo "</tr>";
		 }
		 ?>
         </table>
         <form action="" method="post">
        <div class="quotation"><center>Vehicle Transportation Detail</center></div>
		 <div class="adddel1">
         <input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
		 <input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         </div>

        <div>
        

         <table class="emp_tab">
         <tr class="menu_header">
         <td width="2%">S</td>
         <td width="25%">Vendor's Name</td>
         <td width="15%">Vehicle Type</td>
         <td width="15%">Pick Up Date</td>
         <td width="10%">P.Point</td>
         <td width="15%">Drop Date</td>
         <td width="10%">D.Point</td>
         <td width="8%">Days</td>
         </tr>
         </table>
         <table class="emp_tab" id="dataTable">
         <tr>
         <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
         <td width="25%"><input class="from" name="v_name[]" type="text"></td>
         <td width="15%">
        <select name="v_type[]" class="hotel">
         <?php
		 while($row_v=mysql_fetch_array($res_v))
		 {
         echo "<option>";
         echo $row_v[1];
         echo "</option>";
		 }
		 ?>
         </select>

         </td>
         <td width="15%"><input class="ci" name="p_date[]" type="date" id="pdate"></td>
         <td width="10%"><input class="ci" name="p_point[]" ></td>
         <td width="15%"><input class="ci" name="d_date[]" type="date" id="ddate"></td>
         <td width="10%"><input class="ci" name="d_point[]" type="text"></td>
         <td width="8%"><input class="ci" name="days[]" id="day" type="text"></td>
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
