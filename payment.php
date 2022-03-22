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
            $img = $_SESSION['u_name'];
            $avatar = "select profile from users where username = '$img';";
            $result = mysqli_query($con, $avatar);
              while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <img class="img-profile rounded-circle" src="uploads/<?php echo $row['profile']; ?>" style="height: 2rem; width: 2rem;">
        </a>
        <?php } ?>
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


<div class="jumbotron text-center">
	<h1>Choose Your Payment Option</h1>
</div>

<?php
//gtting total cost of the product
 if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
   $grandtotal = 0;
   foreach ($_SESSION['cart'] as $key => $value) {
     $grandtotal = $grandtotal + ($value['item_qty'] * $value['item_fprice']);

     }
   }
?>

 <div class="container">
  <?php
   if (isset($_GET['order'])) {
     $error = $_GET['order'];

     if ($error == "error") {
       echo "<p class='alert alert-danger text-center'>Your Cash On Delivery Limit is High. Please Purchase Product Under 700rs.</p>";
     }
   }
  ?>
  <br>
  <h1 class="text-center">Grand Total: &#8377; <?php echo $grandtotal; ?></h1>
  <h5 class="text-center">including all service charges. (no delivery charges applied)
</h5>
<br>
   <h1 class="text-center mb-5">
     <a href="cart.php" class="btn btn-warning btn-lg"><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
     <a href="onlinepayment.php" class="btn btn-success btn-lg"><i class="fas fa-credit-card"></i> Pay Online</a>
     <a href="inc/cod.inc.php" class="btn btn-success btn-lg"><i class="far fa-money-bill-alt"></i> Cash On Delivery</a>
   </h1>
 </div>

<?php
//echo "<pre>";
//print_r($_SESSION);
include "footer.php";
?>