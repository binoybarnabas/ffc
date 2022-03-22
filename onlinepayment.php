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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
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
	<h1>Online Payment Method</h1>
</div>

<style>
.padding {
padding: 5rem !important
}
.form-control:focus {
box-shadow: 10px 0px 0px 0px #ffffff !important;
border-color: #4ca746
}
</style>
 
<div class="padding">
    <div class="row">
        <div class="container-fluid d-flex justify-content-center">
            <div class="col-sm-8 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"> <span><strong>CREDIT/DEBIT CARD PAYMENT</strong></span> </div>
                            <div class="col-md-6 text-right" style="margin-top: -5px;"> <img src="https://img.icons8.com/color/36/000000/visa.png"> <img src="https://img.icons8.com/color/36/000000/mastercard.png"> <img src="https://img.icons8.com/color/36/000000/amex.png"> </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 350px">
                        <form method="POST" action="inc/onlinepayment.inc.php">
                            <div class="form-group">
                                <label>CARD NUMBER</label>
                                <input type="text" name="cardnum" class="form-control" placeholder=".... .... .... ...." autocomplete="off" required maxlength="16">
                            </div>
                            <div class="row">
                                <div class="col-md-6" class="form-group">
                                    <label>CARD EXPIRY</label>
                                    <input type="text" name="cardexp" class="form-control" autocomplete="off" placeholder=".. / ...." maxlength="7" required>
                                </div>
                                <div class="col-md-6" class="form-group">
                                    <label>CARD CVC</label>
                                    <input type="text" name="cardcvc" class="form-control" autocomplete="off" placeholder="..." maxlength="3" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>CARD HOLDER NAME</label>
                                <input type="text" name="holdername" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success form-control" name="submit">MAKE PAYMENT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

