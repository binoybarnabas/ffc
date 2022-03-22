<?php

 if (isset($_POST['submit'])) {
 	include "dbh.inc.php";
    session_start();

 	$fname = $_POST['fname'];
 	$fprice = $_POST['fprice'];
 	$fdescription = $_POST['fdescription'];
    $rname = $_POST['rname'];
 	$file = $_FILES['file'];
    $manager = $_SESSION['u_name'];
    $foodstatus = "available";
    
 	$filename = $_FILES['file']['name'];
 	$filetmpname = $_FILES['file']['tmp_name'];
 	$fileerror = $_FILES['file']['error'];
 	$filetype = $_FILES['file']['type'];

 	$fileext = explode('.', $filename);
 	$fileactualext = strtolower(end($fileext)); 
    $allowed = array('jpg', 'jpeg', 'png', 'jfif');


    if (empty($fname) || empty($fprice) || empty($fdescription) || empty($file)) {
    	
    	header("Location: ../maddfood.php?type=empty");
    	exit();
    } elseif (!filter_var($fprice, FILTER_VALIDATE_INT)) {
    	
    	header("Location: ../maddfood.php?type=price");
    	exit();
    } elseif (in_array($fileactualext, $allowed)) {
    	if ($fileerror === 0) {
    			$filenewname = uniqid('', true).".".$fileactualext;
    			$filedestination = '../uploads/'.$filenewname;
    			move_uploaded_file($filetmpname, $filedestination);

    			$sql = "insert into foodlist (fname, fprice, fdescription, frestaurents, fimage, manager, foodstatus) 
 		            values ('$fname', '$fprice', '$fdescription', '$rname', '$filenewname', '$manager', '$foodstatus');";
 		        mysqli_query($con, $sql);
 		        
 		        header("Location: ../maddfood.php?type=success");
 		        exit();    
    	
    	} else {
    		header("Location: ../maddfood.php?type=fileerror");
    	    exit();
    	}
    } else {

    	header("Location: ../maddfood.php?type=filetype");
    	exit();
    }


 } else {
 	header("Location ../index.php?type=invalidaccess");
 	exit();
 }
