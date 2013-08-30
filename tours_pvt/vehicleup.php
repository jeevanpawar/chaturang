<?php
include("../session/session.php");
include("../include/database.php");
$id=$_REQUEST['id5'];
$res_v=mysql_query("select * from vehicle");
$res_vs=mysql_query("select * from vehicle");
$qry_aco="select * from vehicle_transportation where c_id='$c' and v_id='$id'";
$res_aco=mysql_query($qry_aco);
$row_aco=mysql_fetch_array($res_aco);
?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
</head>
<body>
<form action="vehicle_up.php" method="post">
<table class="passengerup">
<tr class="menu_header">
<td width="25%">Vendor's Name</td>
<td width="15%">Vehicle Type</td>
<td width="15%">Pick Up Date</td>
<td width="10%">P.Point</td>
<td width="15%">Drop Date</td>
<td width="10%">D.Point</td>
<td width="8%">Days</td>
</tr>
<tr class="menu_header">
<td width="25%"><input class="from" name="v_name" type="text" value="<?php echo $row_aco[3]; ?>"></td>
<td width="15%">
<select name="v_type" class="hotel">
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
<td width="15%"><input class="ci" name="p_date" type="text"></td>
<td width="10%"><input class="ci" name="p_point" value="<?php echo $row_aco[6]; ?>"></td>
<td width="15%"><input class="ci" name="d_date" type="text"></td>
<td width="10%"><input class="ci" name="d_point" type="text" value="<?php echo $row_aco[8]; ?>"></td>
<td width="8%"><input class="ci" name="days" type="text" value="<?php echo $row_aco[9]; ?>"></td>
</tr>
</table>
<div class="update">
<input name="up" class="insert_b" value=" Update " type="submit" />
<input name="can" class="insert_b" value="Cancel" type="submit" />
</div>
</form>
</body>
</html>