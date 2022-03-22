<?php
  session_start();

 if(!isset($_SESSION['u_name'])){
 header("location: dlogin.php"); 
}
 
 include_once "inc/dbh.inc.php";
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
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            <?php echo $_SESSION['u_name']; ?>
          </span>
          <img class="img-profile rounded-circle" src="uploads/<?php echo $_SESSION['pic']; ?>" style="height: 2rem; width: 2rem;">
        </a>
         <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
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
 
<div class="jumbotron">
	<h1 style="font-size: 63px;">Hello Rider <?php echo $_SESSION['u_name']; ?>!</h1>
	<p class="pt-3" style="font-size: 23px;">Manage Your Control Panel From Here</p>
</div>
 
 <div class="container">
    <div class="row pb-5">
      <div class="col-md-4 ">
            <div class="mylist list-group">
              <a href="dindex.php" class="list-group-item active">Live Status</a>
              <a href="dneworders.php" class="list-group-item ">New Orders</a>
            </div>    
      </div>

      <div class="col-md-8 pt-1 pb-3">
         <legend class="text-center" style="border:1px solid black; width: 100%; margin: 0 auto;">Ready to Ride?
          <?php
          //print_r($_SESSION);
           $dboy = $_SESSION['u_id'];
           $sql = "SELECT * FROM deliveryboy WHERE id='$dboy';";
           $result = mysqli_query($con, $sql);
           $resultcheck = mysqli_num_rows($result);
           if ($resultcheck > 0) {
          ?>
          <table class="table table-responsive-md mytbl text-center">
                <thead>
                <tr>
                <th>Name</th>
                <th>Acount Status</th>
                <th>Select Status</th>
                <th>Your Live Staus</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                 while ($row = mysqli_fetch_assoc($result)) {
                  if ($row['status'] == 'yes') {
                    $new = 'active';
                    $active = 'green';
                  } else {
                    $new = 'suspended';
                    $active = 'red';
                  }  

                  if ($row['dstatus'] == 'Ready') {
                    $dnew = 'Ready';
                    $dactive = 'green';
                  } else {
                    $dnew = 'Not Ready';
                    $dactive = 'red';
                  }
                ?>  
                <td><?php echo $row['uname']; ?></td>
                <td><span style="color: <?php echo $active; ?>"><?php echo $new; ?></span></td>
                <td><a href="inc/dstatus.inc.php?id=<?php echo $dboy ?>&status=Ready&currentstatus=<?php echo $row['status']; ?>&type=success" class="btn btn-success btn-sm">Ready</a> <a class="btn btn-danger btn-sm" href="inc/dstatus.inc.php?id=<?php echo $dboy ?>&status=Not Ready&currentstatus=<?php echo $row['status']; ?>">Not Ready</a></td>
                <td><span style="color: <?php echo $dactive; ?>"><?php echo $dnew; ?></span></td>
                <?php
                 }
                ?>
                </tr>
                </tbody>
               </table> 
          <?php
           }
          ?>     
             </legend>
      </div>

    </div>
  </div>    

<?php
 include "footer.php";
?>