<?php

 if (isset($_POST['submit'])) {
 	include "dbh.inc.php";
    session_start();
    
 	$uname = $_POST['muname'];
 	$pwd = $_POST['mpwd'];

    if (empty($uname) || empty($pwd)) {
    	header("Location: ../mlogin.php?login=empty");
	    exit();
    } else {
       $sql = "SELECT * FROM restaurents WHERE runame='$uname' AND rpwd='$pwd';";
       $result = mysqli_query($con, $sql);
       $resultcheck = mysqli_num_rows($result);

       if ($resultcheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $status = $row['status'];
                if ($status == 'disable') {
                      //echo "status is disabled";
                      header("Location: ../mlogin.php?login=disabled");
                      exit();
                    } elseif ($status == 'enable') {
                      //echo "status is enabled";
                      $_SESSION['u_name'] = $row['runame'];
                      $_SESSION['u_pwd'] = $row['rpwd'];

                      //print_r($_SESSION);
                      header("Location: ../mviewfood.php?login=success");
                      exit();
                   }  
               }
       } else {
        header("Location: ../mlogin.php?login=error");
        exit();
       }
    }
} else {
	header("Location: ../index.php?access=invalid");
	exit();
} 	
?>