<?php
if(isset($_REQUEST['logout']))
{
	session_destroy();
	header("location:../index.php");
}
?>
<div id="menu_div">
			<div id="navigation">
				<div id="menu">
					<ul id="nav">
						<li class="selected"><a href="home.php">Home</a></li>
            <li ><a href="booking.php">Booking Form</a>
            	<ul>
                    <li><a href="newbooking.php">New Booking</a></li>
                </ul>
            
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
                	<li><a href="addhotels.php">Add Hotels</a></li>
                    <li><a href="hotelcomf.php">Hotel Comfirmation</a></li>
                </ul>
            </li>
            
            
            
            <li><a class="has_submenu" href="invoicedetails.php">Invoice</a>
            		<ul>
                    <li><a href="addinvoice.php">Generate Invoice</a></li>
                
                    </ul>
            </li>
           
            
            <li><a class="has_submenu"  href="term.php">T & C</a>
            <ul>
              	<li><a href="addterm.php">Add Terms</a></li>
            </ul>
           </li>
           <li><a class="has_submenu"  href="term.php">Other</a>
            <ul>
              	<li><a href="addroom.php">Room Type</a></li>
                <li><a href="addmeal.php">Meal Plan</a></li>
                <li><a href="addvehicle.php">Vehicle Type</a></li>
                <li><a href="addbank.php">Bank Info</a></li>
            </ul>
           </li>
           <li><a href="?logout">Reports</a>
           <li><a href="?logout">LogOut</a>
           </li>
					</ul><!-- #nav END-->
					
										 
				</div><!-- #menu END-->
			</div><!-- #navigation END-->
		</div>
