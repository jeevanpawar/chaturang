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
	$t2=$_REQUEST['i_name'];
	$t3=$_REQUEST['i_address'];
	$t4=$_REQUEST['i_word'];
	$t5=$_REQUEST['i_advance'];
	$t6=$_REQUEST['i_tax'];
	$qry="insert into invoice(c_id,i_name,i_address,i_word,i_advance,i_tax) values('".$c."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."')";
	$res=mysql_query($qry);
	
	
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
$qry_i="select * from invoice";
$res_i=mysql_query($qry_i);
$count=mysql_num_rows($res_i);
$i_no=$count+1;

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
    			
                <?php
		   include("include/p_header.php");
		?>
                               
                <form name="form5" action="" method="post" enctype="multipart/form-data">
                <br />
                <div class="quotation"><center>Hotel Confirmation Form</center></div>
                <br />
                <table class="h_tab1">
                
                <tr><td class="l_form">Ref No:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                <tr>
                <td class="l_form">Hotel Address:</td><td><textarea class="q_add" name="i_address"><?php echo $c_row[4]; ?></textarea></td></tr>
                
                <tr>
                <tr><td class="l_form">C_In</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo $c_row[2]; ?>">
				</td>
                </tr>
                
               
                <tr><td class="l_form">Reservation Confirmation By:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                
                
                
                
                
                </table>
                <table class="h_tab2">
                <tr><td class="l_form">Date:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                <tr><td class="l_form">Provide the<br> Following Service:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                <tr>
                <tr><td class="l_form">C_Out</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo $c_row[2]; ?>">
				</td>
                </tr>
                <tr><td class="l_form">Confirmed by:</td>
                <td>
                <input type="text" class="q_in" name="i_no" value="<?php echo date('d-m-Y'); ?>">
				</td>
                </tr>
                </table>
                <table class="emp_tab">
                <tr>
                <td>Booked to Stay with You from</td>
                <td><input type="text" class="q_in"></td>
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
                <table class="service" id="dataTable">
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
                <table class="service" id="dataTable1">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                <td><input type="text" class="s_s"></td>
                <td><input type="text" class="s_in"></td>
                </tr>
                </table>
                <table class="service" id="service">
                <tr>
                <td>Billing Instructions
                </td>
                </tr>
                <tr>
                <td><input type="text" class="s_i">
                </td>
                </tr>
                </table>
                
                
                <div class="invoice_b">
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
