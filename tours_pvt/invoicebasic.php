<?php
session_start();

$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
include("../include/database.php");
$qry_i="select * from invoice where c_id='$c' order by i_no desc";
$res_i=mysql_query($qry_i);
$row=mysql_fetch_array($res_i);
$count=$row[1]+1;
echo $count;
?>

<?php

if(isset($_REQUEST['submit']))
{	
	$t1=$_REQUEST['i_no'];
	$t2=$_REQUEST['i_name'];
	$t3=$_REQUEST['i_address'];
	$t4=$_REQUEST['i_word'];
	$t5=$_REQUEST['i_advance'];
	$t6=$_REQUEST['i_tax'];
	$qry="insert into invoice(i_id,c_id,i_name,i_address,i_word,i_advance,i_tax) values('".$t1."','".$c."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."')";
	$res=mysql_query($qry);
	
	$h=$_POST['s'];
	$d = count($h);
	for($i=0; $i<$d; $i++)
	{
		
		$q_s=$_POST['s'][$i];
		$q_d=$_POST['d'][$i];
		$q_r=$_POST['r'][$i];
		$q_a=$_POST['a'][$i];
			
	$quo="insert into sub_invoice(i_id,c_id,s_no,des,rate,amt) values('".$t1."','".$c."','".$q_s."','".$q_d."','".$q_r."','".$q_a."')";
	$quo_res=mysql_query($quo);

	}
	
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
  
</head>

<body>
<div id="container">
	
    
    <div id="sub-header">
    			
                <div class="quo">
                  
                <form name="form5" action="" method="post" enctype="multipart/form-data">
                <br />
                <div class="quotationI"><center>INVOICE</center></div>
                <br />
                <table class="invoice">
                <tr><td class="l_form">Invoce No:</td>
                <td>
                <input type="text" class="q_in" name="i_no" readonly value="<?php echo $count; ?>">
				</td>
                <tr><td class="l_form">Client Name:</td>
                <td>
                <input type="text" class="q_in" name="i_name">
				</td>
                </tr>
                <tr>
                <td class="l_form">Address:</td><td><textarea class="q_add" name="i_address"></textarea></td></tr>
                </table>
                <table class="invoice1">
                <tr><td class="l_form">&nbsp;</td>
                <td>&nbsp;
                
				</td>
                </tr>
                <tr>
                <td class="l_form">Advance:</td>
                <td>
                <input type="text" class="q_in" name="i_advance" >
				</td>
                </tr>
                <tr>
                <td class="l_form">S.Tax:</td>
                <td>
                <input type="text" class="q_in" name="i_tax">
				</td>
                </tr>
                </table>
                <table class="des">
                <tr class="menu_header">
                <td width="2%">S</td>
                <td width="7%">Sr.No.</td>
                <td width="61%">Particulars</td>
                <td width="15%">Rate</td>
                <td width="15%">Amount</td>
                </tr>
                <div class="adddelin">
         		<input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
		 		<input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         		</div>
                </table>
                <table class="des" id="dataTable">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                <td width="7%">
                 <input class="des_sr" type="text" name="s[]" id="0"><br>
                </td>
                <td width="61%">
                 <input class="des_in" type="text" name="d[]" id="0"><br>
                </td>
                <td width="15%">
                 <input class="des_cap" type="text" name="r[]" id="0"><br>
                </td>
                <td width="15%">
                 <input class="des_q" type="text" name="a[]" id="0"><br>
                </td>
                
                </tr>
                
                </table>
                
                 <div id="phone">
                
                </div>
                <table class="word">
                <tr>
                <td>Amount In a Word</td>
              
                <td><input type="text" class="i_in" name="i_word"></td>
                </tr>
                </table>
                <div class="invoice_b">
            	<input name="submit" class="formbutton" value=" Submit " type="submit"/>
                <input name="cancel" class="formbutton" value="Cancel" type="submit"/>
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
