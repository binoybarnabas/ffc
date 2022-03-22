<?php
  if (isset($_POST['submit'])) {
     session_start();
    include "../../inc/dbh.inc.php"; 
  	$aduname = $_POST['uname'];
    $adpwd = $_POST['pwd'];
    
    if (empty($aduname) || empty($adpwd)) {
    	header("Location: ../../../ffc/admin/index.php?login=empty");
  	    exit();
    } else {

    	 $check = "Select ad_uname, ad_pwd from admin where ad_uname='$aduname' and ad_pwd='$adpwd';";
    	 $result = mysqli_query($con, $check);
    	 $resultcheck = mysqli_num_rows($result);

    	 if ($resultcheck > 0) {
    	 	while ($row = mysqli_fetch_assoc($result)) {

    	 		$_SESSION['ad_uname'] = $row['ad_uname'];
    	 		 $_SESSION['ad_pwd'] = $row['ad_pwd'];

    	 		 header("Location: ../../../ffc/admin/admin_index.php?signup=success");
    	 		 exit();
    	 	}
    	 } else {
    	 	header("Location: ../../../ffc/admin/index.php?login=error");
    	 	exit();
    	 }
    }
   
  	
  } else {
  	header("Location: ../../../ffc/index.php");
  	exit();
  }


