<?php

  if (isset($_POST['submit'])) {
  	include '../inc/dbh.inc.php';
  	session_start();
  	$uname = $_POST['uname'];
  	$pwd = $_POST['pwd'];

    if (empty($uname) || empty($pwd)) {
    	header("Location: ../dlogin.php?dlogin=empty");
	    exit();
    }
    
    $sql = "SELECT * FROM deliveryboy WHERE uname = '$uname' AND pwd = '$pwd';";
    $result = mysqli_query($con, $sql);
    $resultcheck = mysqli_num_rows($result);
    
    if ($resultcheck > 0) {
    	while ($row = mysqli_fetch_assoc($result)) {
          
            $_SESSION['u_name'] = $row['uname'];
            $_SESSION['u_pwd'] = $row['pwd'];
            $_SESSION['u_id'] = $row['id'];
            $_SESSION['pic'] = $row['profile'];

          if ($row['status'] == 'yes') {
           //print_r($_SESSION);
             header("Location: ../dindex.php?login=success");
             exit();
          } elseif ($row['status'] == 'no') {
             header("Location: ../dlogin.php?dlogin=denied");
             exit();
          }

      }
    } else {
    	 header("Location: ../dlogin.php?dlogin=error");
    	 exit();
       }
  }
  ?>