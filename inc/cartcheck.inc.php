<?php 

 if (isset($_POST['submit'])) {
  session_start();
  
  if (isset($_SESSION['cart'])) {
    
    $item_array_id = array_column($_SESSION['cart'], 'item_fid');
    if (!in_array($_GET['fid'], $item_array_id)) {
      
      $count = count($_SESSION['cart']);
      $item_array = array(
      'item_fid' => $_GET['fid'],
      'item_fname' => $_POST['hidden_fname'],
      'item_img' => $_POST['hidden_img'],
      'item_fprice' => $_POST['hidden_fprice'],
      'item_qty' => $_POST['qty'],
      'item_frestaurent' => $_POST['hidden_frestaurent'] 
    );
     $_SESSION['cart'][$count] = $item_array;  

    } else {
          header("Location: ../cart.php?item=alreadyadded");
          exit();
    }

  } else {

    $item_array = array(
      'item_fid' => $_GET['fid'],
      'item_fname' => $_POST['hidden_fname'],
      'item_img' => $_POST['hidden_img'],
      'item_fprice' => $_POST['hidden_fprice'],
      'item_qty' => $_POST['qty'],
      'item_frestaurent' => $_POST['hidden_frestaurent'] 
    );
    $_SESSION['cart'][0] = $item_array;
  }

   header("Location: ../cart.php");
   exit();
} else {
  header("Location: ../index.php?entry=invalid");
  exit();
}