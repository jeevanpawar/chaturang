<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$id=$_REQUEST['id_p'];
?>
<?php
	if(isset($_REQUEST['add']))
	{
		$i=$_REQUEST['id_p'];
		$o='1';
		$qry_up="update booking_form SET b_pass='".$o."' where b_id='$i'";
		$res_up=mysql_query($qry_up);
				
		$d=$_POST['p_name'];
		$b = count($d);
		for($i=0; $i<$b; $i++)
		{
			$id=$_REQUEST['id_p'];
		    $p1=$_POST['p_name'][$i];
			$p2=$_POST['p_mf'][$i];
			$p3=$_POST['p_age'][$i];
			$p4=$_POST['p_bdate'][$i];
			$bdate=date('Y-m-d', strtotime($p4));
			$p5=$_POST['p_contact'][$i];
			$p6=$_POST['p_email'][$i];
	     	$qry_p="insert into pass_info(c_id,b_id,p_name,p_mf,p_age,p_bdate,p_contact,p_email) values('".$c."','".$id."','".$p1."','".$p2."','".$p3."','".$bdate."','".$p5."','".$p6."')";
			$res_p=mysql_query($qry_p);
		}
		if($res_p)
		{
			header("location:booking.php");
		}
		else
		{
			echo "error";
		}
	}
	if(isset($_REQUEST['can']))
	{
		header("location:booking.php");
	}

$qry_booking="select * from booking_form where b_id='$id' and c_id='$c'";
$res_booking=mysql_query($qry_booking);

$qry="select * from pass_info where c_id='$c' and b_id='$id'";
$res=mysql_query($qry);

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
        </div>

		<div>
         
         <table class="emp_tab">
         <tr class="menu_header">
         <td width="24%">Tourists Name</td>
         <td width="10%">M/F</td>
         <td width="16%">DOB</td>
         <td width="10%">Age</td>
         <td width="15%">Contact No</td>
         <td width="23%">Email</td>
         <td>Update</td>
         </tr>
         </table>
         <table class="emp_tab">
         <?php
		 while($row=mysql_fetch_array($res))
		 {
         echo "<tr>";
         echo "<td width='24%'><input class='name' type='text' value='$row[3]'></td>";
         echo "<td width='10%'><input type='text' class='mf' value='$row[4]'></td>";
         echo "<td width='16%'><input class='amt' type='text' value='$row[6]'></td>";
         echo "<td width='10%'><input class='amt' type='text' value='$row[5]'></td>";
         echo "<td width='15%'><input class='contact' type='text' value='$row[7]'></td>";
         echo "<td width='23%'><input class='email' type='text' value='$row8'></td>";
		 echo "<td class='insert'><a href=''>Update</a></td>";
         echo "</tr>";
		 }
		 ?>
         </table>
  	     
         <br>
         <form action="" method="post">
         <div class="quotation"><center>Passenger Information</center></div>
		 <div class="adddel1">
         <input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
		 <input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         </div>
         
         <table class="emp_tab">
         <tr class="menu_header">
         <td width="2%">S</td>
         <td width="24%">Tourists Name</td>
         <td width="10%">M/F</td>
         <td width="16%">DOB</td>
         <td width="10%">Age</td>
         <td width="15%">Contact No</td>
         <td width="23%">Email</td>
         </tr>
         </table>
         <table class="emp_tab" id="dataTable">
         
         <tr>
         <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
         <td width="24%"><input class="name" name="p_name[]" type="text"></td>
         <td width="10%"><select name="p_mf[]" class="mf"><option>Male</option><option>Female</option></select></td>
         <td width="16%"><input class="amt" name="p_bdate[]" type="date"></td>
         <td width="10%"><input class="amt" name="p_age[]" type="text"></td>
         <td width="15%"><input class="contact" name="p_contact[]" type="text"></td>
         <td width="23%"><input class="email" name="p_email[]" type="text"></td>
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
