<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19;

$sql = "select * from booking_form";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

if(isset($_REQUEST['go']))
{
	$t1=$_REQUEST['result'];
	$qry="select * from Booking_form where b_id='$t1'";
	$res=mysql_query($qry);
	$count=mysql_num_rows($res);
}
?>
<?php
$qry_h="select * from hotel";
$res_h=mysql_query($qry_h);

$qry_m="select * from meal";
$res_m=mysql_query($qry_m);

$qry_room="select * from room_type";
$res_room=mysql_query($qry_room);

$qry_v="select * from vehicle";
$res_v=mysql_query($qry_v);

$qry_com="select * from company where comp_id='$c'";
$res_com=mysql_query($qry_com);
$row_com=mysql_fetch_array($res_com);

$qry_inv="select * from inv where c_id='$c'";
$res_inv=mysql_query($qry_inv);
$count_inv=mysql_num_rows($res_inv);
$cnt=$count_inv+1;
?>
<?php
	if(isset($_REQUEST['add']))
	{
		$o='1';
		$t0=$_POST['b_no'];
		$date=$_POST['b_date'];
		$t1=date('Y-m-d', strtotime($date));
		$t2=$_POST['se'];
		$t3=$_POST['office'];
		$t4=$_POST['pax'];
		$t5=$_POST['adult'];
		$t6=$_POST['child'];
		$t7=$_POST['amt']; 
		$t8=$_POST['room'];
		$t9=$_POST['bed']; 
		$qry_b="insert into booking_form(b_id,c_id,bkg_date,b_se,b_office,b_pax,b_adult,b_child,b_total_amt,b_room,b_bed,b_pass,b_hotel,b_vehicle) values('".$t0."','".$c."','".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."','".$t7."','".$t8."','".$t9."','".$o."','".$o."','".$o."')";
		$res_b=mysql_query($qry_b);
		
		$d=$_POST['p_name'];
		$b = count($d);
		for($i=0; $i<$b; $i++)
		{	
		    $p1=$_POST['p_name'][$i];
			$p2=$_POST['p_mf'][$i];
			$p3=$_POST['p_age'][$i];
			$p4=$_POST['p_bdate'][$i];
			$bdate=date('Y-m-d', strtotime($p4));
			$p5=$_POST['p_contact'][$i];
			$p6=$_POST['p_email'][$i];
	     	$qry_p="insert into pass_info(c_id,b_id,p_name,p_mf,p_age,p_bdate,p_contact,p_email) values('".$c."','".$t0."','".$p1."','".$p2."','".$p3."','".$bdate."','".$p5."','".$p6."')";
			$res_p=mysql_query($qry_p);
		}
		$v=$_POST['h_name'];
		$vb = count($v);
		for($j=0; $j<$vb; $j++)
		{
			$h1=$_POST['v_name'][$j];
			$h2=$_POST['h_name'][$j];
			$h3=$_POST['place1'][$j];
			$h4=$_POST['room1'][$j];
			$h5=$_POST['meal1'][$j];
			$h6=$_POST['cin1'][$j];
			$d6=date('Y-m-d', strtotime($h6));
			$h7=$_POST['cout1'][$j];
			$d7=date('Y-m-d', strtotime($h7));
			$qry_hotel="insert into hotel_acomodation(c_id,b_id,h_vendor,h_hotel,h_place,h_room,h_meal,h_cin,h_cout) values('".$c."','".$t0."','".$h1."','".$h2."','".$h3."','".$h4."','".$h5."','".$d6."','".$d7."')";
			$res_hotel=mysql_query($qry_hotel);
		
		
		}
		
		$f=$_POST['v_type'];
		$fb = count($f);
		for($k=0; $k<$fb; $k++)
		{
			
			$v1=$_POST['v_name'][$k];
			$v2=$_POST['v_type'][$k];
			$v3=$_POST['p_date'][$k];
			$f3=date('Y-m-d', strtotime($v3));
			$v4=$_POST['p_point'][$k];
			$v5=$_POST['d_date'][$k];
			$f5=date('Y-m-d', strtotime($v5));
			$v6=$_POST['d_point'][$k];
			$v7=$_POST['days'][$k];
			$qry_v="insert into vehicle_transportation(c_id,b_id,v_name,v_type,v_pdate,v_ppoint,v_ddate,v_dpoint,v_days) values('".$c."','".$t0."','".$v1."','".$v2."','".$f3."','".$v4."','".$f5."','".$v6."','".$v7."')";
			$res_v=mysql_query($qry_v);
		}
		
		$qry_insert="insert into inv(c_id,p_no) values('".$c."','".$cnt."')";
		$res_insert=mysql_query($qry_insert);

		if($res_b)
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
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/addrow.js"></script>
<script type="text/javascript" src="custom.js"></script>
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
	
	$("#content").load("bookingpagination.php?page=1", Hide_Load());



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
		
		$("#content").load("bookingpagination.php?page=" + pageNum, Hide_Load());
	});
	
	
});
	</script>
<script language="javascript">
function getValues(val){
var numVal1=parseInt(document.getElementById("one").value);
var numVal2=parseInt(document.getElementById("two").value);
var totalValue = numVal1 + numVal2;
document.getElementById("main").value = totalValue;
}
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {

	$('.datepicker').live('click', function() {
		dateFormat: 'dd-mm-YY';
		
    	$(this).datepicker('destroy').datepicker({changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd",yearRange: "1900:+10",showOn:'focus'}).focus();
    });
	$( ".datepicker" ).datepicker( "refresh" );
});
</script>
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
        </td>
        </tr>
        </table>
        
        <div class="popupbox" id="popuprel">
		<div id="intabdiv">
        <h2>Booking Form Details</h2>
        <?php
		$pre=date('y',strtotime("-1 year"));
		$curr=date('y');
		?>
        <table class="b_tab1">
        <tr>
        <td>Booking No:<br><input class="q_in" name="b_no" type="text" value="<?php echo "$row_com[2]"."$pre"."$curr".'_'."$cnt" ?>"></td>
        
        <td>Booking Date:<br><input class="q_in datepicker" name="b_date" type="text" id="datepicker"/></td>
        
        <td>SE:<br><input class="q_in"  name="se" type="text" /></td>
        
        <td>Client Name:<br><input class="q_in"  name="office" type="text" /></td>
        
        <td>Booking Amount:<br><input class="q_in"  name="amt" type="text" /></td>
        </tr>
        <tr>
        <td>No Of Rooms:<br><input class="q_in"  name="room"  type="text" /></td>
        <td>No Of Beds:<br><input class="q_in"  name="bed" type="text" /></td>
        <td>Adults:<br><input id="one" value="0"  onKeyUp="getValues(1)" type="text" class="q_in" name="adult" /> </td>
        <td>Childs:<br><input id="two" value="0"  onKeyUp="getValues(2)" type="text" class="q_in" name="child" /></td>
        <td>Pax:<br><input id="main" value="" type="text"  class="q_in" name="pax" /></td>
        </tr>
        </table> 
        <br>
        <!-- Passenger Information start -->
         <div class="newtab">
         <div class="quotation"><center>Passenger Information</center></div>
		 <div class="adddel"> 
         <input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
		 <input type="button" value="-" class="add" onClick="deleteRow('dataTable')" > 
         </div>
         <table class="passenger"> 
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
         <table class="pass_tab" id="dataTable">
         <tr>
         <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
         <td width="24%"><input class="name" name="p_name[]" type="text"></td>
         <td width="10%"><select name="p_mf[]" class="mf"><option>Male</option><option>Female</option></select></td>
         <td width="16%"><input class="amt datepicker" name="p_bdate[]" type="text"></td>
         <td width="10%"><input class="amt" name="p_age[]" type="text"></td>
         <td width="15%"><input class="contact" name="p_contact[]" type="text"></td>
         <td width="23%"><input class="email" name="p_email[]" type="text"></td>
         </tr>
         </table>
         </div>
          <br>
         <!-- Passenger Information ends -->
         <!-- Hotel Information start -->
         <div class="quotation"><center>Hotel Information</center></div>
         <div class="adddel">
         <input type="button" value="+" class="add" onClick="addRow('dataTable1')" >&nbsp;
		 <input type="button" value="-" class="add" onClick="deleteRow('dataTable1')" >
         </div>
        <table class="passenger">
         <tr class="menu_header">
         <td width="2%">S</td>
         <td width="24%">Vendor's Name</td>
         <td width="15%">Hotel Name</td>
         <td width="10%">Place</td>
         <td width="10%">Room</td>
         <td width="9%">Meal PLN</td>
         <td width="15%">C/I</td>
         <td width="15%">C/O</td>
         </tr>
         </table>
         
         <table class="pass_tab" id="dataTable1">
         <tr>
         <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
         <td width="24%"><input class="name" name="v_name[]" type="text"></td>
         <td width="15%">
         <select name="h_name[]" class="mf">
         <?php
		 while($row=mysql_fetch_array($res_h))
		 {
			 echo "<option>";
			 echo $row[2];
			 echo "</option>";
		 }
		 ?>
         </select>
         </td>
         <td width="10%"><input class="amt" name="place1[]" type="text"></td>
         <td width="10%">
         <select name="room1[]" class="mf">
         <?php
		 while($row_room=mysql_fetch_array($res_room))
		 {
			 echo "<option>";
			 echo $row_room[1];
			 echo "</option>";
		 }
		 ?>
         </select>
         </td>
         <td width="9%">
         <select name="meal1[]" class="mf">
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
         <td width="15%"><input class="amt datepicker" name="cin1[]" type="text" value="<?php echo date('Y-m-d'); ?>"></td>
         <td width="15%"><input class="amt datepicker" name="cout1[]" type="text" value="<?php echo date('Y-m-d'); ?>"></td>
         </tr>
         </table>
          <br>
         <!-- Hotel Information ends -->
         <!-- Vehicle Information ends -->
         <div class="quotation"><center>Vehicle Transportation Detail</center></div>
		 <div class="adddel">
         <input type="button" value="+" class="add" onClick="addRow('dataTable2')" >&nbsp;
		 <input type="button" value="-" class="add" onClick="deleteRow('dataTable2')" >
         </div>

        <div>
        

         <table class="passenger">
         <tr class="menu_header">
         <td width="2%">S</td>
         <td width="23%">Vendor's Name</td>
         <td width="15%">Vehicle Type</td>
         <td width="15%">Pick Up Date</td>
         <td width="11%">P.Point</td>
         <td width="15%">Drop Date</td>
         <td width="11%">D.Point</td>
         <td width="8%">Days</td>
         </tr>
         </table>
         <table class="pass_tab" id="dataTable2">
         <tr>
         <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
         <td width="23%"><input class="name" name="v_name[]" type="text"></td>
         <td width="15%">
        <select name="v_type[]" class="mf">
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
         <td width="15%"><input class="amt datepicker" name="p_date[]" type="text" value="<?php echo date('Y-m-d'); ?>" id="pdate"></td>
         <td width="11%"><input class="amt" name="p_point[]" ></td>
         <td width="15%"><input class="amt datepicker" name="d_date[]" type="text" value="<?php echo date('Y-m-d'); ?>" id="ddate"></td>
         <td width="11%"><input class="amt" name="d_point[]" type="text"></td>
         <td width="8%"><input class="amt" name="days[]" id="day" type="text"></td>
         </tr>
         </table>
         </div>
         <!-- Vehicle Information ends -->
        <div class="b_button">
        <input type="submit" value="Submit" name="add">
        <input type="submit" value="Cancel" name="can">
        </div>
        
        </form>
        </div>
		</div>
        <?php
		if($count > '0')
		{
        if(isset($_REQUEST['go']))
        {	
			$row=mysql_fetch_array($res);
			
			echo "<table class='emp_tab'>";
			echo "<tr class='menu_header'>";
        	echo "<td width='110'>B.No</td>";
        	echo "<td width='110'>B.Date</td>";
        	echo "<td width='150'>SE</td>";
        	echo "<td>Office</td>";
        	echo "<td width='50'>Pax</td>";
        	echo "<td width='50'>Adult</td>";
        	echo "<td width='50'>Child</td>";
			echo "<td width='95'>Passenger</td>";
			echo "<td width='95'>Hotel</td>";
			echo "<td width='95'>Vehicle</td>";
        	echo "<td width='130'>View Details</td>";
        	echo "</tr>";
			echo "<tr class='pagi'>";
			echo "<td>";
			echo $row[0]; 
			echo "</td>";
			echo "<td>";
			echo date('d-m-Y', strtotime($row[2]));
			echo "</td>";
			echo "<td>";
			echo $row[3];
			echo "</td>";
			echo "<td>";
			echo $row[4];
			echo "</td>";
			echo "<td>";
			echo $row[5];
			echo "</td>";
			echo "<td>";
			echo $row[6];
			echo "</td>";
			echo "<td>";
			echo $row[7];
			echo "</td>";
			
			if($row[9]==1)
			{
			echo "<td class='print'>";
			echo "<a href='passenger.php?id_p=$row_u[0]'>&nbsp;Update&nbsp;</a>";
			echo "</td>";
			}
			else
			{
			echo "<td class='insert'>";
			echo "<a href='passenger.php?id_p=$row_u[0]'>&nbsp;&nbsp;Insert&nbsp;&nbsp;</a>";
			echo "</td>";
			}
			if($row[10]==1)
			{
			echo "<td class='print'>";
			echo "<a href='accommodation.php?id_a=$row_u[0]'>&nbsp;Update&nbsp;</a>";
			echo "</td>";
			}
			else
			{
			echo "<td class='insert'>";
			echo "<a href='accommodation.php?id_a=$row_u[0]'>&nbsp;&nbsp;Insert&nbsp;&nbsp;</a>";
			echo "</td>";
			
			}
			if($row[11]==1)
			{
			echo "<td class='print'>";
			echo "<a href='vehicle_trans.php?id_v=$row_u[0]'>&nbsp;Update&nbsp;</a>";
			echo "</td>";
			}
			else
			{
			echo "<td class='insert'>";
			echo "<a href='vehicle_trans.php?id_v=$row_u[0]'>&nbsp;&nbsp;Insert&nbsp;&nbsp;</a>";
			echo "</td>";
			}
			echo "<td class='print'>";
			echo "<a href='viewdetail.php?id=$row[0]'>View Details</a>";
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
