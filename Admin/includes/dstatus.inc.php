<?php
  
   if (isset($_GET['id'])) {
   	include "../../inc/dbh.inc.php";
   	$did = $_GET['id'];
   	$status = $_GET['type'];
   	$currentstatus = $_GET['current'];

    if ($status == $currentstatus) {
    	
    	header("Location: ../../../ffc/admin/admin_dboy.php");
    	exit();

    } elseif ($status != $currentstatus) {
    	$sql = "update deliveryboy set status='$status' where id='$did';";
    	mysqli_query($con, $sql);

    	header("Location: ../../../ffc/admin/admin_dboy.php");
    	exit();
    }
   }

   if (isset($_GET['button'])) {
      $did = $_GET['id'];
   	  $status = $_GET['type'];
   	  $currentstatus = $_GET['current'];

   	   if ($status == $currentstatus) {
    	
    	header("Location: ../../../ffc/admin/admin_dboy.php");
    	exit();

    } elseif ($status != $currentstatus) {
    	$sql = "update deliveryboy set status='$status' where id='$did';";
    	mysqli_query($con, $sql);

    	header("Location: ../../../ffc/admin/admin_dboy.php");
    	exit();
    }
   }