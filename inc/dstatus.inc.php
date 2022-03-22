<?php
  
   if (isset($_GET['id'])) {
   	include "dbh.inc.php";

   	$id = $_GET['id'];
   	$status = $_GET['status']; //not ready
   	$current = $_GET['currentstatus']; //not ready

   echo $id.'<br>';
   echo $status.'<br>';
   echo $current.'<br>';

    if ($status == $current) {
    	
    	header("Location: ../dindex.php");
    	exit();

    } elseif ($status != $current) {
    	$sql = "UPDATE deliveryboy SET dstatus = '$status' WHERE id = '$id';";
    	mysqli_query($con, $sql);

    	header("Location: ../dindex.php");
    	exit();
    }

   }

   if (isset($_GET['type'])) {
   	 $id = $_GET['id'];
   	 $status = $_GET['status'];
     $current = $_GET['currentstatus'];

     if ($status == $current) {
    	
    	header("Location: ../dindex.php");
    	exit();

    } elseif ($status != $current) {
    	$sql = "UPDATE deliveryboy SET dstatus = '$status' WHERE id = '$id';";
    	mysqli_query($con, $sql);

    	header("Location: ../dindex.php");
    	exit();
    }

   }