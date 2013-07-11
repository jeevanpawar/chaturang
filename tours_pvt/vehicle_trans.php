<?php
session_start(0);
error_reporting(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];
include("../include/database.php");
?>
<?php
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

</head>
<body>
<div id="container">
<div id="sub-header">
    <?php
		include("include/p_header.php");	
	?>
       	<br />
 		<div class="quotation"><center>Vehicle Transportation Detail</center></div>
		 <div class="adddel">
         <input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
		 <input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         </div>

        <div>
        <form action="" method="post">

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
         <td width="15%"><input class="ci" name="p_date[]"type="text"></td>
         <td width="10%"><input class="ci" name="p_point[]" type="text"></td>
         <td width="15%"><input class="ci" name="d_date[]" type="text"></td>
         <td width="10%"><input class="ci" name="d_point[]" type="text"></td>
         <td width="8%"><input class="ci" name="days[]" type="text"></td>
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
