<?php
include("../session/session.php");
include("../include/database.php");
	$id1=$_POST['id5'];
if(isset($_REQUEST['up']))
{
	$t1=$_POST['v_name'];
	$t2=$_POST['v_type'];
	$t3=$_POST['p_date'];
	$t4=$_POST['p_point'];
	$t5=$_POST['d_date'];
	$t6=$_POST['d_point'];
	$t7=$_POST['days'];
	$qry="update vehicle_transportation SET v_name='".$t1."', v_type='".$t2."', v_pdate='".$t3."', v_ppoint='".$t4."', v_ddate='".$t5."', v_dpoint='".$t6."', v_days='".$t7."' where v_id='$id1'";
	$res=mysql_query($qry);
}
?>
