<?php

  if (isset($_GET['id'])) {
    include "dbh.inc.php";
    $id = $_GET['id'];
    $current = $_GET['current'];
    $newstatus = 'accept';

    	$sql = "UPDATE foodorders SET res_status = '$newstatus' WHERE orderid = '$id';";
    	mysqli_query($con, $sql);

    	header("Location: ../liveorders.php");

 } 

 if (isset($_GET['type'])) {
 
    $id = $_GET['id'];
    $current = $_GET['current'];
    $type = $_GET['type'];

    	$sqls = "UPDATE foodorders SET res_status = '$type' WHERE orderid = '$id';";
    	mysqli_query($con, $sqls);

    	header("Location: ../liveorders.php");
    	exit();
 }

