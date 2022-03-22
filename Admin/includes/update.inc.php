<?php

  if (isset($_POST['reset'])) {
 	
   include "../../inc/dbh.inc.php"; 
  	$aduname = $_POST['uname'];
    $adpwd1 = $_POST['pwd1'];
    $adpwd2 = $_POST['pwd2'];

    if (empty($aduname) || empty($adpwd1) || empty($adpwd2)) {
    	header("Location: ../../../ffc/admin/index.php?update=empty");
  	    exit();
    } elseif ($adpwd1 != $adpwd2) {
    	header("Location: ../../../ffc/admin/index.php?update=incorrect");
  	    exit();
    } else {

        $reset = "update admin set ad_pwd='$adpwd1' where ad_uname='$aduname';";
        mysqli_query($con, $reset);

        header("Location: ../../../ffc/admin/index.php?update=success");
    	exit();
    }

 } else {
  	header("Location: ../../../ffc/index.php");
  	exit();
  }