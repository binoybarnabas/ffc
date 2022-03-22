<?php

  if (isset($_POST['submit'])) {
  	include "dbh.inc.php";
    
     $uname = mysqli_real_escape_string($con, $_POST['name']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $text = mysqli_real_escape_string($con, $_POST['txt']);

     if (empty($uname) || empty($email) || empty(txt)) {
     	header("Location: ../index.php?contact=invalidfiels");
     	exit();
     } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?contact=invalidemail");
     	exit();	
        } else {
        	$add = "insert into contact ( username, email, textarea )                 
        	 values ( '$uname', '$email', '$text' );";
        	mysqli_query($con, $add);

        	header("Location: ../index.php?contact=success");
     	    exit();
        }
     }

  } else {
  	header("Location: ../index.php?contact=invalidaccess");
  	exit();
  }