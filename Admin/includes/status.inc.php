<?php

 session_start();

if (!isset($_SESSION['ad_uname'])) {
 header("Location: ../../../ffc/index.php");
 exit();
} else {

 $res = $_GET['rid'];
 $stats = "enable";
 include "../../inc/dbh.inc.php";

 //echo $res;
 //echo $stat;

 //Giving enable option to restaurent

  $run = "select status from restaurents where rid='$res';";
  $result = mysqli_query($con, $run);
  $resultcheck = mysqli_num_rows($result);

  if ($resultcheck > 0) {
  	$newresult = mysqli_fetch_assoc($result);

  	//print_r($newresult);//
    
    if ($newresult == $stats) {
    	header("Location: ../../../ffc/admin/admin_restaurent.php?access=alreadygranted");
    	exit();
    } elseif ($newresult != $stats) {
    	$sql = "update restaurents set status='$stats' where rid='$res';";
    	mysqli_query($con, $sql);

    	header("Location: ../../../ffc/admin/admin_restaurent.php?access=granted");
    	exit();
    }
  }

}