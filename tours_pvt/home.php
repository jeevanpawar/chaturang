<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19;
$sql = "select * from booking_form where c_id='$c'";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

if(isset($_REQUEST['go']))
{
	$t1=$_REQUEST['result'];
	$qry="select * from Booking_form where b_id='$t1' where c_id='$c'";
	$res=mysql_query($qry);
	$count=mysql_num_rows($res);
}
?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
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
	
	$("#content").load("homepagination.php?page=1", Hide_Load());



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
		
		$("#content").load("homepagination.php?page=" + pageNum, Hide_Load());
	});
	
	
});
	</script>
	


</head>
<body class="fade-in">
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
        Booking Information
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
        	echo "<td width='150'>B.No</td>";
        	echo "<td width='150'>B.Date</td>";
        	echo "<td>SE</td>";
        	echo "<td>Office</td>";
        	echo "<td width='70'>Pax</td>";
        	echo "<td width='70'>Adult</td>";
        	echo "<td width='70'>Child</td>";
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
                
        
  	<div class="clear"></div>
    </div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
