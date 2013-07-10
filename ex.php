<?php 
include("include/database.php");
$res=mysql_query("select * from ex order by c_id desc");
$row=mysql_fetch_array($res);
$row1=mysql_fetch_array($res);
echo "<br>";
echo $a=date('m');
echo "<br>";
echo $id=$row[2];
echo "<br>";
if($a=='04')
{
	if($id!='1')
	{
		$b=1;
		echo "<input type='text' value='$b.a'>";
	}
	else if($id=='1')
	{
		$c=$id+1;
		echo "<input type='text' value='$c.b'>";
	}
}
else{
	$d=$id+1;
	echo "<input type='text' value='$d.e'>";
}

?>