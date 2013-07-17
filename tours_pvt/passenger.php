<?php
session_start();
error_reporting(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];
include("../include/database.php");

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
?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript" src="js/jquery.js"></script>
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
$(document).ready(function() {

$('#dob_b').change(function(){

var today = new Date();
var dd = Number(today.getDate());
var mm = Number(today.getMonth()+1);

var yyyy = Number(today.getFullYear()); 

var myBD = $('#dob_b').val();
var myBDM = Number(myBD.split("/")[0])
var myBDD = Number(myBD.split("/")[1])
var myBDY = Number(myBD.split("/")[2])
var age = yyyy - myBDY;
//$('#age input').attr("disabled","disabled")

        if(mm < myBDM)
        {
        age = age - 1;      
        }
        else if(mm == myBDM && dd < myBDD)
        {
        age = age - 1
        };

        $('#age_d').val(age);
    });

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
        <div>
        <form action="" method="post">
  	    
         <div class="quotation"><center>Passenger Information</center></div>
		 <div class="adddel">
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
         <td width="16%"><input class="amt" name="p_bdate[]" type="date" id="dob_b" ></td>
         <td width="10%"><input class="amt" name="p_age[]" type="text" id="age_d" value=""></td>
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
