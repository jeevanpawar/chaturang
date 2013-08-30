<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 20; 
$sql = "select * from invoice";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page)
?>
<?php
$qry_i="select * from invoice where c_id='$c' order by i_no desc";
$res_i=mysql_query($qry_i);
$row=mysql_fetch_array($res_i);
$count=$row[1]+1;
?>

<?php

if(isset($_REQUEST['submit']))
{	
	$t0=date('Y-m-d', strtotime($_REQUEST['i_date']));
	$t1=$_REQUEST['i_no'];
	$t2=$_REQUEST['i_name'];
	$t3=$_REQUEST['i_address'];
	
	$t5=$_REQUEST['i_advance'];
	$t6=$_REQUEST['i_tax'];
	$qry="insert into invoice(i_id,c_id,i_name,i_address,i_advance,i_tax,i_date) values('".$t1."','".$c."','".$t2."','".$t3."','".$t5."','".$t6."','".$t0."')";
	$res=mysql_query($qry);
	$i_id=mysql_insert_id();
	$h=$_POST['d'];
	$d = count($h);
	for($i=0; $i<$d; $i++)
	{	
		$t1=$_REQUEST['i_no'];	
		$q_s=$i+1;
		$q_d=$_POST['d'][$i];
		$q_r=$_POST['r'][$i];
		$q_a=$_POST['a'][$i];
			
	$quo="insert into sub_invoice(i_id,c_id,s_no,des,rate,amt) values('".$t1."','".$c."','".$q_s."','".$q_d."','".$q_r."','".$q_a."')";
	$quo_res=mysql_query($quo);

	}
	
	if($res)
	{
		header("location:report.php?id=$i_id");
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />


	<script type="text/javascript">
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
	
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

    //Default Starting Page Results
   
	$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_Load();
	
	$("#content").load("invoicepagination.php?page=1", Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){
			
		Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		
		$("#content").load("invoicepagination.php?page=" + pageNum, Hide_Load());
	});
	
	
});
</script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/addrow.js"></script>
<script type="text/javascript" src="custom.js"></script>
</head>
<body>
<div id="container">
<div id="sub-header">	
    <?php
	include("include/p_header.php");
	?>
               
        <table class="emp_tab">
        <tr class="search_res">
        <td class="info">
        		
		
        <input class="searchfield" type="text" value="Search..." onFocus="if (this.value == 'Search...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Search...';}" name="result" />
        <input class="go" name="go" type="submit" value="Search">
        <span class="newbook"><a href="#" rel="popuprel" class="popup new">New Invoice</a> </span>
        </td>        </tr>
        </table>
        <div class="popupbox" id="popuprel">
		<div id="intabdiv">
        <h2>Invoice Details</h2>
                
                <form name="form5" action="" method="post" enctype="multipart/form-data">
                <table class="invoice">
                <tr><td class="l_form">Invoce No:</td>
                <td>
                <input type="text" class="q_in" name="i_no" readonly value="<?php echo $count; ?>">
				</td>
                <tr><td class="l_form">Client Name:</td>
                <td>
                <input type="text" class="q_in" name="i_name" value="<?php echo $row_info[4]; ?>">
				</td>
                </tr>
                <tr>
                <td class="l_form">Address:</td><td><textarea class="q_add" name="i_address"></textarea></td></tr>
                </table>
                <table class="invoice1">
                <tr><td class="l_form">Date</td>
                <td><input type="date" class="q_in" name="i_date" ></td>
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
                <select name="i_tax">
                <option>5%</option>
                <option>5%</option>
                </select>
				</td>
                </tr>
                </table>
                <table class="des">
                <tr class="menu_header">
                <td width="2%">S</td>
                <td width="68%">Particulars</td>
                <td width="15%">Rate</td>
                <td width="15%">Amount</td>
                </tr>
                <div class="adddel">
       			<input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
		 		<input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         		</div>
                </table>
                <table class="des" id="dataTable">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                
                <td width="68%">
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
 				<div class="b_button">
       			 <input type="submit" value="Submit" name="submit">
        		<input type="submit" value="Cancel" name="cancel">
       
      			</div>
				</form>
        
		</div>
        </div>
              <div>
                
                <div id="loading" ></div>
		<div id="content" ></div>
        <table width="800px">
	<tr><Td>
			<ul id="pagination">
				<?php
				//Show page links
				for($i=1; $i<=$pages; $i++)
				{
					echo '<li id="'.$i.'">'.$i.'</li>';
				}
				?>
	</ul>	
	</Td></tr></table>

                </div>                
               
  				</div>
                
                </div>
                
 <div id="fade"></div>
        
    
    	<div class="clear"></div>
    
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
