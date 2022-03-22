<?php

 if (isset($_POST['submit'])) {
 	include "dbh.inc.php";
 	
 	$rname = $_POST['rname'];
 	$remail = $_POST['remail'];
 	$rplace = $_POST['rplace'];
 	$rcontact = $_POST['rcontact'];
 	$raddress = $_POST['raddress'];


    if (empty($rname) || empty($remail) || empty($rplace) || empty($rcontact) || empty($raddress)) {

    	header("Location: ../mindex.php?type=empty");
    	exit();
    	
    } else {

    	if (!filter_var($remail, FILTER_VALIDATE_EMAIL)) {
    		
    		header("Location: ../mindex.php?type=invalidemail");
    	    exit();

    	} else {

    		$insert = "insert into restaurents (rname, remail, rplace, rcontactno, raddress) 
 		values ('$rname', '$remail', '$rplace', '$rcontact', '$raddress');";

 		mysqli_query($con, $insert);

 		header("Location: ../mindex.php?type=success");
    	exit();
    	}
    }

 } else {
 	header("Location: ../index.php?type=invalidacces");
 	exit();
 }