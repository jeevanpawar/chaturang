<?php
include("../session/session.php");
error_reporting(0);
$per_page =19; 
if($_GET)
{
 $page=$_GET['page'];
}
	include("../include/database.php");
	
$sql = "select * from hotel";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);
?>
<?php
if(isset($_REQUEST['del_id']))
{
	$delhotel=$_REQUEST['del_id'];
	$del_qry="delete from hotel where h_id=".$delhotel;
	$del_res=mysql_query($del_qry);
	if($del_res)
	{
		
		header("location:hotel.php");
	}
	else
	{
		echo"Error!!!";
	}
}
?>
<?php
if(isset($_REQUEST['go']))
{
	$t1=$_REQUEST['result'];
	$qry="select * from hotel where h_reg='$t1' or h_name='$t1'";
	$res=mysql_query($qry);
	$count=mysql_num_rows($res);
}

?>
<?php
	if(isset($_REQUEST['add']))
	{
		$date=$_POST['h_date'];
		$t1=date('Y-m-d', strtotime($date));
		$t2=$_POST['h_name'];	
		$t3=$_POST['h_address'];
		$t4=$_POST['h_reg'];
		$t5=$_POST['h_pname'];
		$t6=$_POST['h_mob'];
		$t7=$_POST['h_ph'];
		$t8=$_POST['h_email'];
		$t9=$_POST['h_pin'];
		$t10=$_POST['b_name'];
		$t11=$_POST['b_ac'];
		$c_qry="insert into hotel(h_date,h_name,h_address,h_reg,h_pname,h_mob,h_ph,h_email,h_pin,h_bank,h_ac) values('".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."','".$t7."','".$t8."','".$t9."','".$t10."','".$t11."')";
		$c_res=mysql_query($c_qry);
		if($c_res)
		{
			header("location:hotel.php");
		}
	
		}
	if(isset($_REQUEST['can']))
	{
		header("location:hotel.php");
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<script type="text/javascript" src="../js/jquery.min.js"></script>

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
	
	$("#content").load("hotelpagination.php?page=1", Hide_Load());



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
		
		$("#content").load("hotelpagination.php?page=" + pageNum, Hide_Load());
	});
	
	
});
	</script>


<script type="text/javascript">
function confirmSubmit()
{
var agree=confirm("Are you sure to Delete this Entry?");
if (agree)
	return true ;
else
	return false ;
}

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
        <form action="" method="post">
       	<table class="emp_tab">
        <tr class="search_res">
        <td class="info">
        <input class="searchfield" type="text" value="Search..." onFocus="if (this.value == 'Search...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Search...';}" name="result" />
        <input class="go" name="go" type="submit" value="Search">
        <span class="newbook"><a href="#" rel="popuprel" class="popup new">New</a> </span>  
        </td>        </tr>
        </table>
        <div class="popupbox" id="popuprel">
		<div id="intabdiv">
        <h2>Hotel Information</h2>
        <table class="tab_1" align="center">
        <tr><td class="l_form">Date:</td><td><input class="q_in" id="datefield" type="text" name="h_date" value="<?php  echo date("d-m-Y"); ?>"/></td></tr>
        <tr><td class="l_form">Hotel Name:</td><td><input class="q_in" type="text" name="h_name" /></td></tr>
 	    <tr><td class="l_form">Address:</td><td><textarea class="q_add" name="h_address"></textarea></td></tr>
        <tr><td class="l_form">Registration No:</td><td><input class="q_in" type="text" name="h_reg"/></td></tr>
        <tr><td class="l_form">Pin Code:</td><td><input class="q_in" type="text" name="h_pin"/></td></tr>
       </table>
       <table class="tab_2" align="center">
       <tr><td class="l_form">Concern Person:</td><td><input class="q_in" type="text" name="h_pname" /></td></tr>
       <tr><td class="l_form">Mobile No:</td><td><input class="q_in" type="text" name="h_mob" ></td></tr>
       <tr><td class="l_form">Phone No:</td><td><input class="q_in" type="text" name="h_ph"/></td></tr>
 	   <tr><td class="l_form">E-Mail:</td><td><input class="q_in" type="text" name="h_email"/></td></tr>              		
       <tr><td class="l_form">Bank Name:</td><td><input class="q_in" type="text" name="b_name"/></td></tr>
       <tr><td class="l_form">Bank Account No:</td><td><input class="q_in" type="text" name="b_ac"/></td></tr>
       </table>
		<div class="b_hotel">
        <input type="submit" value="Submit" name="add">
        <input type="submit" value="Cancel" name="can">
        </div>
		</div>
        </div>
        </form>
        <?php
		if($count > '0')
		{
        if(isset($_REQUEST['go']))
        {	
			$row=mysql_fetch_array($res);
			
			echo "<table class='emp_tab'>";
			echo "<tr class='menu_header'>";
        	echo "<td width='140'>Registration No</td>";
        	echo "<td>Hotel Name</td>";
        	echo "<td>Address</td>";
        	echo "<td>Contact Person</td>";
        	echo "<td width='200'>Contact No</td>";
        	echo "<td width='65'>Delete</td>";
        	echo "<td width='70'>Update</td>";
        	echo "</tr>";
			echo "<tr class='pagi'>";
			echo "<td>";
			echo $row[4]; 
			echo "</td>";
			echo "<td>";
			echo $row[2];
			echo "</td>";
			echo "<td>";
			echo $row[3];
			echo "</td>";
			echo "<td>";
			echo $row[5];
			echo "</td>";
			echo "<td>";
			echo $row[6];
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='?del_id=$row[0]' onclick='return confirmSubmit()'>Delete</a>";
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='updatehotel.php?uid=$row[0]'>Update</a>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "<br>";
        }
		}
		?>
    
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
        
<div id="fade"></div>
<div class="clear"></div>
</div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
