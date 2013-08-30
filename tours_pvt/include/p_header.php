<?php
if(isset($_REQUEST['logout']))
{
	session_destroy();
	header("location:../index.php");
}
?>
<?php
$qry_company="select * from company where comp_id='$c'";
$res_company=mysql_query($qry_company);
$row_company=mysql_fetch_array($res_company);
?>
<div id="menu_div">
			<div id="navigation">
				<div id="menu">
					<ul id="nav">
						<li class="selected"><a href="home.php">Home</a></li>
            <li ><a href="booking.php">Booking Form</a>
            	
            </li>
            <li><a class="has_submenu" href="payment.php">Payments</a>
            		<ul>
                    <!--<li><a href="montlyincome.php">Monthy Inc.</a></li>
                    <li><a href="montlyexpense.php">Monthy Exp.</a></li>
                    <li><a href="totalreport.php">Reports</a></li>         -->           
                    </ul>
            </li>
            <li><a class="has_submenu" href="hotel.php">Hotels</a>
            	<ul>
                	<li><a href="hotelcomf.php">Hotel Comfirmation</a></li>
                </ul>
            </li>
                    
            
            <li><a class="has_submenu" href="invoicedetails.php">Invoice</a>
            </li>
           
            
            <li><a class="has_submenu"  href="term.php">T & C</a>
            </li>
           <li><a class="has_submenu"  href="#">Other</a>
            <ul>
              	<li><a href="addroom.php">Room Type</a></li>
                <li><a href="addmeal.php">Meal Plan</a></li>
                <li><a href="addvehicle.php">Vehicle Type</a></li>
                <li><a href="addbank.php">Bank Info</a></li>
            </ul>
           </li>
           <li><a href="#">Reports</a>
           <ul>
              	<li><a href="addroom.php">Present Position</a></li>
                <li><a href="outstanding.php">Oustanding Report</a></li>
                <li><a href="package.php">Total Packages During Specific Period</a></li>
				<li><a href="hotelreport.php">Hotel Report</a></li>
            </ul>
            </li>
           <li><a href="?logout">LogOut</a>
           </li>
					</ul><!-- #nav END-->					
		   
                                         
				</div><!-- #menu END-->
			</div><!-- #navigation END-->
		</div>
<table class="user">
<tr>
<td align="right"><?php echo $a.'<br>'.$row_company[1]; ?></td><td><?php echo "<img src='../images/user.png'  />"; ?></td>
</tr>
</table>