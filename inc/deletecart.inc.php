<?php
  
 if (isset($_GET['cart'])) {
 	session_start();
 	if ($_GET['cart'] == 'delete') {
 		
       foreach ($_SESSION['cart'] as $key => $value) {

         if ($value['item_fid'] == $_GET['id']) {
         	unset($_SESSION['cart'][$key]);

         	header("Location: ../cart.php?delete=success");
         	exit();
         }
       }

 	}
 } else {
 	header("Location: ../index.php?entry=invalid");
 	exit();
 }