<?php

 session_start();
 if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    include "dbh.inc.php";
    $grandtotal = 0;
 	foreach ($_SESSION['cart'] as $key => $value) {
 		
 		$fid = $value['item_fid'];
 		$fname = $value['item_fname'];
 		$fprice = $value['item_fprice'];
 		$fqty = $value['item_qty'];
 		$frestaurent = $value['item_frestaurent'];
 		$total = ($value['item_fprice'] * $value['item_qty']);
 		$user = $_SESSION['u_name'];
 		$orderdate = date('y-m-d');
 		$payment_type = 'cod';
 		$res_status = 'waiting';

 		$grandtotal = $grandtotal + ($value['item_qty'] * $value['item_fprice']);
        $min = 700;
              
           if ($grandtotal <= $min) {
        
            $run = "insert into foodorders (fid, fname, fprice, frestaurent, qty, ordereduser, totalprice, ordered_date, payment_type, res_status) 
 		    values ('$fid', '$fname', '$fprice', '$frestaurent', '$fqty', 
 	 	    '$user', '$total', '$orderdate', '$payment_type', '$res_status');";

 	 	     mysqli_query($con,$run);
            
            echo "<script>alert('Your Order has been placed successfully')</script>";
 	 	    echo "<script>window.location= '../orderplaced.php?order=submitted'</script>";
 	         
 	       } else {
 	    	header("Location: ../payment.php?order=error");
 	     	exit();
 	      }
   
       }



 	echo "<pre>";
 	print_r($_SESSION);	

 	

 } else {
 	header("Location: ../index.php");
 	exit();
 }