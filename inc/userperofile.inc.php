<?php
 if (isset($_POST['submit'])) {
  include_once "dbh.inc.php";
  session_start();

 	$name = $_POST['fullname'];
  $uname = $_POST['username'];
 	$email = $_POST['email'];
 	$contact = $_POST['contact'];
 	$address = $_POST['address'];
 	//$pwd = $_POST['pwd'];
  $id = $_SESSION['u_id'];
  $_SESSION['u_name'] = $uname;
  $_SESSION['u_pwd'] = $pwd;
  $file = $_FILES['file'];

  $filename = $_FILES['file']['name'];
  $filetmpname = $_FILES['file']['tmp_name'];
  $fileerror = $_FILES['file']['error'];

    if (empty($name) || empty($uname) || empty($email) || empty($contact) || empty($address)) {
    	
        header("Location: ../userprofile.php?update=empty");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	
    	header("Location: ../userprofile.php?update=email");
    	exit();
    } elseif (!filter_var($contact, FILTER_VALIDATE_INT)) {
    	
    	header("Location: ../userprofile.php?update=contact");
    	exit();
    } elseif (!isset($_SESSION['u_id'])) {
       	  
      header("Location: ../userprofile.php?update=error");
    	exit();
    } else {

         $filedestination = '../uploads/'.$filename;
         move_uploaded_file($filetmpname, $filedestination);

          $update = "update users set fullname = '$name', username = '$uname', email = '$email', contactno = '$contact', address = '$address', profile = '$filedestination'  where id='$id';";
          mysqli_query($con, $update);
 
          header("Location: ../userprofile.php?update=success");
          exit();
         }
    
} else {

	header("Location: ../index.php");
    exit();
}
