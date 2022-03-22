<?php

if (isset($_POST['submit'])) {

  include "dbh.inc.php";
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $uname = mysqli_real_escape_string($con, $_POST['uname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $contact = mysqli_real_escape_string($con, $_POST['contact']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
  $avatar = $_POST['avatar'];

  if (empty($fname) || empty($uname) || empty($email) || empty($contact) || empty($address) || empty($pwd)) {
    header("Location: ../signup.php?signup=empty");
    exit();
  } elseif (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
    header("Location: ../signup.php?signup=char");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?signup=email");
    exit();
  } else {

    $sql = "select * from users where username = '$uname';";
    $result = mysqli_query($con, $sql);
    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck > 0) {
      header("Location: ../signup.php?signup=user");
      exit();
    } else {

      $run = "select * from users where email = '$email';";
      $result = mysqli_query($con, $run);
      $resultcheck = mysqli_num_rows($result);

      if ($resultcheck > 0) {
        header("Location: ../signup.php?signup=checkemail");
        exit();
      } elseif (!filter_var($contact, FILTER_VALIDATE_INT)) {
        header("Location: ../signup.php?signup=contact");
        exit();
      } else {

        $sql = "select contactno from users where contactno='$contact';";
        $result = mysqli_query($con, $sql);
        $resultcheck = mysqli_num_rows($result);

        if ($resultcheck > 0) {
          header("Location: ../signup.php?signup=contact-alreadyexists");
          exit();
        } elseif (!preg_match("/^[6-9][0-9]{9}$/", $contact)) {
          header("Location: ../signup.php?signup=invalidcontact");
          exit();
        } else {

          $insert = "insert into users ( fullname, username, email, contactno, address, pwd, profile ) 
                          values ( '$fname', '$uname', '$email', '$contact', '$address', '$pwd', '$avatar' );";
          mysqli_query($con, $insert);

          header("Location: ../login.php?signup=success");
          exit();
        }
      }
    }
  }
} else {
  header("Location: ../index.php?signup=invalidaccess");
  exit();
}
