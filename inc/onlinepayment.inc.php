<?php


   if (isset($_POST['submit'])) {
   	
   	include "dbh.inc.php";
   	session_start();

   	$cardnum = $_POST['cardnum'];
   	$cardexp = $_POST['cardexp'];
   	$cardcvc = $_POST['cardcvc'];
   	$holdername = $_POST['holdername'];


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
 		$payment_type = 'online';
 		$res_status = 'waiting';

 		$grandtotal = $grandtotal + ($value['item_qty'] * $value['item_fprice']);        
        
            $run = "insert into foodorders (fid, fname, fprice, frestaurent, qty, ordereduser, totalprice, ordered_date, payment_type, res_status) 
 		    values ('$fid', '$fname', '$fprice', '$frestaurent', '$fqty', 
 	 	    '$user', '$total', '$orderdate', '$payment_type', '$res_status');";

 	 	     mysqli_query($con,$run);
            
 	 	    //header("Location: ../foodlist.php?order=submitted");
        echo "<script>alert('Please wait, Your Transaction is being processing')</script>";
        echo "<script>window.location= '../orderplaced.php?order=submitted'</script>";
   
       }



 	echo "<pre>";
 	print_r($_SESSION);	

 	

 }


   }