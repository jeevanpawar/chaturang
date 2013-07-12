<?php
session_start();
error_reporting(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];

include("../include/database.php");
$id=$_REQUEST['id'];
$id2=$_REQUEST['id2'];
$c_query="select * from hotel_acomodation where h_id='$id2' and b_id='$id'";
$c_res=mysql_query($c_query);
$c_row=mysql_fetch_array($c_res);

?>

<?php

if(isset($_REQUEST['submit']))
{	
	$t1=$_POST['t1'];
	$t2=$_POST['t2'];
	$t3=$_POST['t3'];
	$t4=$_POST['t4'];
	$t5=date('Y-m-d', strtotime($_POST['t5']));
	$t6=$_POST['t6'];
	$t7=$_POST['t7'];
	$t8=$_POST['t8'];
	$t9=$_POST['t9'];
	$t10=$_POST['t10'];
	$t11=$_POST['t11'];
	$qry="insert into hotel_confirmation(c_id,b_id,hc_add,hc_date,hc_service,hc_cin) values('".$c."','".$t1."','".$t2."','".$t5."','".$t6."')";
	$res=mysql_query($qry);
	$insert=mysql_insert_id();
	
	if($res)
	{
		header("location:invoicedetails.php");
	}
	else
	{
		echo"error";
	}
	
}
if(isset($_REQUEST['cancel']))
{
	header("location:invoicedetails.php");
}

?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
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
<script type="text/javascript">
function addRow1(tableID) {
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
		
				function deleteRow1(tableID)
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
        <?php  include("include/p_header.php");	?>
                <form name="form5" action="" method="post" enctype="multipart/form-data">
                <br />
                <div class="quotation"><center>Hotel Confirmation Form</center></div>
                <br />
                <table class="h_tab1">
                
                <tr><td class="l_form">Ref No:</td>
                <td>
                <input type="text" class="q_in" name="t1" value="<?php echo $c_row[2]; ?>">
				</td>
                </tr>
                <tr>
                <td class="l_form">Hotel Address:</td><td><textarea class="q_add" name="t2"><?php echo $c_row[4]; ?></textarea></td></tr>
                
                <tr>
                <tr><td class="l_form">C_In</td>
                <td>
                <input type="text" class="q_in" name="t3">
				</td>
                </tr>
                
               
                <tr><td class="l_form">Reservation Confirmation By:</td>
                <td>
                <input type="text" class="q_in" name="t4">
				</td>
                </tr>
                                          
                </table>
                <table class="h_tab2">
                <tr><td class="l_form">Date:</td>
                <td>
                <input type="text" class="q_in" name="t5" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                <tr><td class="l_form">Service To:</td>
                <td>
                <input type="text" class="q_in" name="t6">
				</td>
                </tr>
                <tr>
                <tr><td class="l_form">C_Out</td>
                <td>
                <input type="text" class="q_in" name="t7">
				</td>
                </tr>
                <tr><td class="l_form">Confirmed by:</td>
                <td>
                <input type="text" class="q_in" name="t8">
				</td>
                </tr>
                </table>
                <table class="service">
                <tr>
                <td width="310">Booked to Stay with You from</td><td><input type="text" class="s_i" name="t9"></td>
                </tr>
                
                </table>
                <table class="service" id="service">
                <tr>
                <td>Service To Be Provided
                <div class="adddels">
         		<input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
		 		<input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         		</div>
                </td>
                </tr>
                </table>
                <table class="service1" id="dataTable">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                <td><input type="text" class="s_s"></td>
                <td><input type="text" class="s_in"></td>
                </tr>
                </table>
                <table class="service" id="service">
                <tr>
                <td>Travel Details
                <div class="adddels">
         		<input type="button" value="+" class="add" onClick="addRow1('dataTable1')" >&nbsp;
		 		<input type="button" value="-" class="add" onClick="deleteRow1('dataTable1')" >
         		</div>
                </td>
                </tr>
                </table>
                <table class="service1" id="dataTable1">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                <td><input type="text" class="s_s"></td>
                <td><input type="text" class="s_in"></td>
                </tr>
                </table>
                <table class="service" id="service">
                <tr>
                <td width="310">Billing Instructions
                </td>
                <td><input type="text" class="s_i" name="t10">
                </td>
                </tr>
                </table>
                <table class="service" id="service">
                <tr>
                <td width="310">Remarks
                </td>
                <td><input type="text" class="s_i" name="t11">
                </td>
                </tr>
                
                </table>
                
                
                <div class="service_b">
            	<input name="submit" class="formbutton" value=" Submit " type="submit" onClick="javascript:return validateMyForm();" />
                <input name="cancel" class="formbutton" value="Cancel" type="submit" />
                </div>
                </form>
  				</div>
                
                </div>
                
        
    
    	<div class="clear"></div>
    
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
