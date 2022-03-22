<?php

  if (isset($_POST['submit'])) {
  	
                      include "dbh.inc.php";
                      $fname = mysqli_real_escape_string($con, $_POST['fname']);
                      $uname = mysqli_real_escape_string($con,$_POST['uname']);
                      $email = mysqli_real_escape_string($con,$_POST['email']);
                      $rplace = mysqli_real_escape_string($con, $_POST['rplace']);
                      $contact = mysqli_real_escape_string($con,$_POST['contact']);
                      $address = mysqli_real_escape_string($con,$_POST['address']);
                      $pwd = mysqli_real_escape_string($con,$_POST['pwd']);
                      $status = $_POST['status'];

                      if ( empty($fname) || empty($uname) || empty($email) || empty($contact) || empty($address)|| empty($pwd) || empty($rplace)) 
                      {
                        header("Location: ../msignup.php?msignup=empty");
                        exit();

                      } 
                      elseif (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                        header("Location: ../msignup.php?msignup=char");
                        exit();

                      } 

                      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      	header("Location: ../msignup.php?msignup=email");
                        exit();

                      } 
                      else {
                   
                       $sql = "select * from restaurents where runame = '$uname';";
                       $result = mysqli_query($con, $sql);
                       $resultcheck = mysqli_num_rows($result);

                       if ($resultcheck > 0) {
                   	     header("Location: ../msignup.php?msignup=user");
                   	     exit();

                      } 

                      else {

                       $run = "select * from restaurents where remail = '$email';";
                       $result = mysqli_query($con, $run);
                       $resultcheck = mysqli_num_rows($result);

                       if ($resultcheck > 0) {
                        header("Location: ../msignup.php?msignup=checkemail");
                        exit();

                       } 
                       elseif (!filter_var($contact, FILTER_VALIDATE_INT)) {
                        header("Location: ../msignup.php?msignup=contact");
                        exit();

                       } else { 

                        $sql = "select rcontactno from restaurents where rcontactno='$contact';";
                        $result = mysqli_query($con, $sql);
                        $resultcheck = mysqli_num_rows($result);

                        if ($resultcheck > 0) {
                        header("Location: ../msignup.php?msignup=contact-alreadyexists");
                        exit();

                        } elseif (!preg_match("/^[6-9][0-9]{9}$/", $contact)) {
                          header("Location: ../msignup.php?msignup=invalidcontact");
                           exit();
                        }  
                        else {

                          $insert = "insert into restaurents (rname, runame, remail, rplace, rcontactno, raddress, rpwd, status) values ('$fname', '$uname', '$email', '$rplace', '$contact', '$address', '$pwd', '$status');";
                             mysqli_query($con, $insert);

                             header("Location: ../mlogin.php?msignup=success");
                             exit();
                        }

                      }
                    }
                    }

   } else {
  	header("Location: ../index.php?msignup=invalidaccess");
  	exit();
  }