<?php
	session_start();
	error_reporting(0);
	$a=$_SESSION['user'];
	$c=$_SESSION['comp'];
	include("../include/database.php");
	$hotel="select * from hotel";
	$hotel_res=mysql_query($hotel);
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script>
$(document).ready(function(){

$('[rel=tooltip]').bind('mouseover', function(){
	  
		
	
 if ($(this).hasClass('ajax')) {
	var ajax = $(this).attr('ajax');	
			
  $.get(ajax,
  function(theMessage){
$('<div class="tooltip">'  + theMessage + '</div>').appendTo('body').fadeIn('fast');});

 
 }else{
			
	    var theMessage = $(this).attr('content');
	    $('<div class="tooltip">' + theMessage + '</div>').appendTo('body').fadeIn('fast');
		}
		
		$(this).bind('mousemove', function(e){
			$('div.tooltip').css({
				'top': e.pageY - ($('div.tooltip').height() / 2) - 5,
				'left': e.pageX + 15
			});
		});
	}).bind('mouseout', function(){
		$('div.tooltip').fadeOut('fast', function(){
			$(this).remove();
		});
	});
						   });

</script>

<style>
.tooltip{
	position:absolute;
	background-image:url(tip-bg.png);
	background-color:#09C;
	background-position:left center;
	background-repeat:no-repeat;
	color:#000;
	padding:5px 18px 5px 18px;
	font-size:12px;
	font-family:Verdana, Geneva, sans-serif;
		box-shadow: 0px 0px 0px 5px rgba(0, 0, 0, 0.3), 
             0px 20px 15px 0px rgba(0, 0, 0, 0.6); 

	}
	
.tooltip-image{
	float:left;
	margin-right:5px;
	margin-bottom:5px;
	margin-top:3px;}	
	
	
	.tooltip span{font-weight:700;
color:#ffea00;}




	#imagcon{
		overflow:hidden;
		float:left;
		height:100px;
		width:100px;
		margin-right:5px;
	}
	#imagcon img{
		max-width:100px;
	}
	#wrapper{
		margin:0 auto;
		width:500px;
		margin-top: 99px;
	}
	.tool td
	{
		height:30px;
			
	}
	.link a
	{
		color:#030303;
		text-transform:uppercase;
	}
</style>

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
        <td class="info">Hotel Information</td>
        
        <td width="305">
        <input class="result" name="result" type="text">
        <input class="go" name="go" type="submit" value="Search">
        </td>
        </tr>
        </table>
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
    
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="140">Registration No</td>
        <td>Hotel Name</td>
        <td>Hotel Address</td>
        <td>Contact Person</td>
        <td width="200">Contact No</td>
        <td width="75">Delete</td>
        <td width="75">Update</td>
        </tr>
       
		<?php
		
			while($row_hotel=mysql_fetch_array($hotel_res))
			{
				echo "<tr class='pagi'>";
				echo "<td>";
				echo $row_hotel[4];
				echo "</td>";
				echo "<td class='link'>";
				echo '<a href=# alt=Image Tooltip rel=tooltip content="<table class=tool><tr><td id=con>Registration No:</td><td>'.$row_hotel[4].'</td></tr><tr><td id=con>Hotel Name:</td><td>'.$row_hotel[2].'</td></tr><tr><td id=con>Address</td><td>'.$row_hotel[3].'</td></tr><tr><td id=con>Concern Person:</td><td>'.$row_hotel[5].'</td></tr><tr><td id=con>Contact No:</td><td>'.$row_hotel[6].'</td></tr><tr><td id=con>Email:</td><td>'.$row_hotel[8].'</td></tr><tr><td id=con>Bank Name:</td><td>'.$row_hotel[10].'</td></tr><tr><td id=con>Bank Account No:</td><td>'.$row_hotel[11].'</td></tr></table>">'.$row_hotel['2'].'</a>'.'<br>';
  
				echo "</td>";
				echo "<td>";
				echo $row_hotel[3];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[5];
				echo "</td>";
				echo "<td>";
				echo $row_hotel[4];
				echo "</td>";
				echo "<td class='print'>";
				echo "<a href='?del_id=$row_hotel[0]' onclick='return confirmSubmit()'>Delete</a>";
				echo "</td>";
				echo "<td class='print'>";
				echo "<a href='updatehotel.php?uid=$row_hotel[0]'>Update</a>";
				echo "</td>";
				echo "</tr>";
			}
		?>
        </table>
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
