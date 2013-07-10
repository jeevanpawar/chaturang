<?php
$result4 = mysql_query("SELECT * FROM `inv` ORDER BY id desc") or die('could not select');   //Select last transaction
$row4 = mysql_fetch_array($result4);
$invoice4 = $row4['invoice_number'];
$inc_number = $row4['inc_number'];
$year = $row4['year'];

$brand = 'Ch';
$cur_date = date('y');  // date('y')
$invoice = $brand.$cur_date.'00001';
$customer_id = rand(5487 , 9854);

if($cur_date == $year) {   //if current year equal to last year in transaction 
    if($invoice4 == $invoice && $inc_number == '1') {
        //IF EXIST 
        //add inc_number 
        $inc_number_add = $inc_number + 1; // Increment by 1
        //invoice_number
        $inc = str_pad($inc_number_add, 9999, '0', STR_PAD_LEFT); //Format with leading 0 eg: 00001
        $invoice_number_db = $brand.$cur_date.$inc;
        //create new order
        mysql_query("INSERT INTO `inv` (customer_id,invoice_number,inc_number,year) VALUES ($customer_id, '$invoice_number_db' ,$inc_number_add,$cur_date)") 
        or die('Cannot Insert into database!');
        echo "<br/>Insert Success!</br>";
	    }
    else {
        //IF NOT EXIST 
            mysql_query("INSERT INTO `inv` (customer_id,year) VALUES ($customer_id,$cur_date)") or die('Cannot Insert into database!');
            echo "Insert customer_id Success!";

            echo '</br>';

            // Retrieve data again after create
            $result = mysql_query("SELECT * FROM `inv` WHERE customer_id='$customer_id'") or die('could not select');         $row = mysql_fetch_array($result);
            //var
            $id_val = $row['id'];
            $inc_number_add = $inc_number + 1;  // Increment by 1
            $inc = str_pad($inc_number_add, 9999, '0', STR_PAD_LEFT); //Format with leading 0 eg: 00001
            $invoice = $brand.$cur_date.$inc;

            //Update invoice
            mysql_query("UPDATE `inv` SET invoice_number='$invoice' , inc_number='$inc_number_add' WHERE customer_id=$customer_id") or die('error 89');
            echo "</br>UPDATE invoice_number Success!</br>";
    }

}
    else {

        //IF TODAY IS NEW YEAR RESET INVOICE NUMBER
        mysql_query("INSERT INTO `inv` (customer_id,invoice_number,inc_number,year) VALUES ($customer_id, '$invoice' , '1' ,$cur_date)") 
        or die('Cannot Insert into database!');
        echo "<br/>Insert customer_id Success!</br>";

    }

        echo "<br/><br/>FINAL OUTPUT <br/>";
        $result_3 = mysql_query("SELECT * FROM `inv` WHERE customer_id='$customer_id' ") or die('could not select');		$row_3 = mysql_fetch_array($result_3);
        $id3 = $row_3['id'];
        $customer_id3 = $row_3['customer_id'];
        $inc_number = $row_3['inc_number'];
        $invoice3 = $row_3['invoice_number'];
		$year3 = $row_3['year'];

            
            echo $inc_number;
            echo $year3.'<br/>';

?>
