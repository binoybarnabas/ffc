<?php
session_start();
if(!isset($_SESSION['u_name'])){
header("location: login.php");
}
include "inc/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width initial-scale=1">
  <title>FOOD COURT</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src="https://kit.fontawesome.com/041a644664.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Food Court</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#contact">Contact Us</a>
      </li>
       
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item pr-1">
        <form method="POST" class="form-inline mt-1" action="search.php">
          <input type="text" name="search" placeholder="search" class="form-control mr-1">
            <button class="btn btn-light btn-outline-success btn-md" name="submit-search"><i class="fas fa-search"></i>
            </button>
        </form>
      </li>
     
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">
             <?php echo $_SESSION['u_name']; ?>
          </span>

    <?php
     $usersession = $_SESSION['u_id'];
     $avatar = "select profile from users where id = '$usersession';";
     $newresult = mysqli_query($con, $avatar);
     while ($row = mysqli_fetch_assoc($newresult)) {
    ?>
         <img class="img-profile rounded-circle" src="uploads/<?php echo $row['profile']; ?>" style="height: 2rem; width: 2rem;">
        </a>
    <?php 
      } 
    ?>

         <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="admin_profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
      </li>
    </ul>
  </div>
</nav>
    <!--end navigation-->

 <!--logout model-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below to end your current session</div>

        <form method="POST" action="inc/logout.inc.php">
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-danger" name="submit">Logout</button>
        </div>
      </form>

      </div>
    </div>
  </div>
 <!--logout model-->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-8 col-sm-12">
      <br><h1>Edit Your Profile</h1><br>
      <?php
        if (isset($_GET['update'])) {
          $fetch = $_GET['update'];
          if ($fetch == "success") {
            echo "<p class='text-center alert alert-success'>Profile Updated Successfully</p>";
          }
          if ($fetch == "error") {
            echo "<p class='text-center alert alert-danger'>Error in updating profile</p>";
          }
          if ($fetch == "contact") {
            echo "<p class='text-center alert alert-danger'>Enter correct contact number</p>";
          }
          if ($fetch == "email") {
            echo "<p class='text-center alert alert-danger'>Enter correct email address</p>";
          }
          if ($fetch == "empty") {
            echo "<p class='text-center alert alert-danger'>Empty fields detected</p>";
          }
        }
      ?>
     <?php
       $usersession = $_SESSION['u_id'];
       $check = "select  id, fullname, username, email, contactno, address, pwd, profile from users where id = '$usersession';";
       $result = mysqli_query($con, $check);
       $resultcheck = mysqli_num_rows($result);

       if ($resultcheck > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <form method="POST" class="bg-dark mb-5 p-3" action="inc/userperofile.inc.php" enctype="multipart/form-data">
        <label class="text-white">Name</label><span class="text-danger"> *</span>
        <div class="form-group">
          <input type="text" name="fullname" class="form-control" value="<?php echo $row['fullname']; ?>">
        </div>
        <label class="text-white">profile</label><span class="text-danger"> *</span>
        <div>
          <img src="uploads/<?php echo $row['profile']; ?>" class="img-fluid" style="height: 120px; width: 130px;">
        </div>
        <div class="form-group">
          <input type="file" name="file" class="form-control">
        </div>
        <label class="text-white">Username</label><span class="text-danger"> *</span>
        <div class="form-group">
          <input type="text"  name="username" class="form-control" value="<?php echo $_SESSION['u_name']; ?>">
        </div>
        <label class="text-white">Email</label><span class="text-danger"> *</span>
        <div class="form-group">
          <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
        </div>
        <label class="text-white">Contact No</label><span class="text-danger"> *</span>
        <div class="form-group">
          <input type="text" name="contact" class="form-control" value="<?php echo $row['contactno']; ?>">
        </div>
        <label class="text-white">Delivery Address</label><span class="text-danger"> *</span>
        <div class="form-group">
          <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">
        </div>
       
         <?php 
           }
         }
        ?>
        <button class="btn btn-outline-warning btn-md btn-dark" name="submit" value="update">Update</button>
        &nbsp;<a href="foodlist.php" class="btn btn-dark">Go Back</a>
      </form>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12 mt-5">
      <img src="images/food.png" class="img-fluid">
    </div>
  </div>
</div>



 <?php
include "footer.php";
 ?>