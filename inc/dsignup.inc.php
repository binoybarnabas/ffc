
 <?php

  if (isset($_POST['submit'])) {

    include "../inc/dbh.inc.php";
    $name = $_POST['fname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $blood = $_POST['blood'];
    $license = $_POST['dlicense'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $file = $_FILES['file'];
    $pwd = $_POST['pwd'];
    $status = $_POST['status'];
    $dstatus = $_POST['dstatus'];

    //echo $name;
    //echo $username;
    //echo $email;
    // echo $blood;
    //echo $license;
    //echo $contact;
    //echo $address;
    //echo $pwd;
    //print_r($file);

    //gettinf file details
    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $filetmploc = $_FILES['file']['tmp_name'];
    $fileerror = $_FILES['file']['error'];
    $filesize = $_FILES['file']['size'];

    //image validation
    $fileext = explode('.', $filename);
    $fileactualext = strtolower(end($fileext));
    $allowed = array('jpg', 'jpeg', 'png', 'jfif');
    /*
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../dsignup.php?error=invalidemail");
        exit();
      } elseif (!filter_var($contact, FILTER_VALIDATE_INT)) {
        header("Location: ../dsignup.php?error=invalidinteger");
        exit();
      } elseif (!preg_match("/^[6-9][0-9]{9}$/", $contact)) {
        header("Location: ../dsignup.php?error=invalidnumber");
        exit();
      }
      */
    if (empty($name) || empty($uname) || empty($email) || empty($contact) || empty($address) || empty($pwd) || empty($blood) || empty($license)) 
    {
      header("Location: ../dsignup.php?dsignup=empty");
      exit();
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      header("Location: ../dsignup.php?dsignup=char");
      exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../dsignup.php?dsignup=email");
      exit();
    } 
    else {

      $sql = "select * from deliveryboy where uname = '$uname';";
      $result = mysqli_query($con, $sql);
      $resultcheck = mysqli_num_rows($result);

      if ($resultcheck > 0) {
        header("Location: ../dsignup.php?dsignup=user");
        exit();
      } else {

        $run = "select * from deliveryboy where email = '$email';";
        $result = mysqli_query($con, $run);
        $resultcheck = mysqli_num_rows($result);

        if ($resultcheck > 0) {
          header("Location: ../dsignup.php?dsignup=checkemail");
          exit();
        } elseif (!filter_var($contact, FILTER_VALIDATE_INT)) {
          header("Location: ../dsignup.php?dsignup=contact");
          exit();
        } else {

          $sql = "select contact from deliveryboy where contact='$contact';";
          $result = mysqli_query($con, $sql);
          $resultcheck = mysqli_num_rows($result);

          if ($resultcheck > 0) {
            header("Location: ../dsignup.php?dsignup=contact-alreadyexists");
            exit();
          } elseif (!preg_match("/^[6-9][0-9]{9}$/", $contact)) {
            header("Location: ../dsignup.php?dsignup=invalidcontact");
            exit();
          } 
          else {

            if (in_array($fileactualext, $allowed)) {

              if ($fileerror === 0) {

                $filenewname = uniqid('', true) . "." . $fileactualext;
                $filedestination = '../uploads/' . $filenewname;
                move_uploaded_file($filetmploc, $filedestination);

                $sql = "insert into deliveryboy (name, uname, email, bgroup, license, contact, address, profile, pwd, status, dstatus) values ('$name', '$uname', '$email', '$blood', '$license', '$contact', '$address', '$filenewname', '$pwd', '$status', '$dstatus');";
                mysqli_query($con, $sql);

                header("Location: ../dlogin.php?dsignup=success");
                exit();
              }
            } else {
              header("Location: ../dsignup.php?error=fileerror");
              exit();
            }
          }
        }
      }
    }
  }
