<?php
session_start(0);
$a=$_SESSION['user'];

error_reporting(0);

if(isset($_REQUEST['id']))
{
	session_destroy();
	header("location:index.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />

</head>

<body>
<div id="container">
	 <div id="sub-header">
    <?php
	
		include("include/t_header.php");
	?>
    
   
   	<br />
        <table class="emp_tab">
        <tr class="emp_header">
        <td width="150">Form No</td>
        <td width="250">Clients Name</td>
        <td width="250">Tourist Info</td>
        <td>Hotel</td>
        <td width="150">Vehicle</td>
        </tr>
        </table>
     </div>
    </div>
        
    
    	<div class="clear"></div>
    </div>

 <div id="footer">
     <div class="clear"></div> 
    </div>
</body>
</html>
