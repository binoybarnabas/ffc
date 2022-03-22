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


<div class="jumbotron">
	<h1>Your Shopping Cart</h1>
	<p>Looks Tasty!!!</p>
</div>

 <div class="container">
<table class="table table-responsive-md table-striped justify-content-center mb-5">
	<thread>
		<tr>
			<th>Food Name</th>
      <th>Food Image</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Order Total</th>
			<th>Action</th>
		</tr>
	</thread>
	<tbody class="mytbl">
   <?php
    if (!empty($_SESSION['cart'])) {
      $total = 0;
      foreach ($_SESSION['cart'] as $key => $value) {
   ?>
 
		<tr>
			<td><?php echo $value['item_fname']; ?></td>
      <td><img src="uploads/<?php echo $value['item_img']; ?>" height='50px'></td>
			<td><?php echo $value['item_qty']; ?></td>
			<td>&#8377; <?php echo $value['item_fprice']; ?></td>
			<td>&#8377; <?php echo number_format($value['item_qty'] * $value['item_fprice'], 2); ?></td>
			<td><a class="btn btn-danger btn-sm" href="inc/deletecart.inc.php?cart=delete&id=<?php echo $value['item_fid']; ?>"><i class="fa fa-trash-alt"></i> Remove</a></td>
		</tr>

     <?php
          $total = $total + ($value['item_qty'] * $value['item_fprice']);
      }
     ?>
     
     <tr>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td><b>Total - </b>&#8377; <?php echo number_format($total, 2); ?></td>
     </tr>
     <tr>
       <td><a href="foodlist.php" class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add More</a></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td><a href="payment.php" class="btn btn-success btn-sm"><i class="fas fa-cart-arrow-down"></i> CheckOut</a></td>
     </tr>
   <?php  
    } else {
      echo "<script>alert('Oops! your shopping cart is empty. Try Add Some Items')</script>";
      echo "<script>window.location='foodlist.php'</script>";
    }
   ?>
	</tbody>
</table>

 </div>

<?php
//echo '<pre>';
//print_r($_SESSION);
include "footer.php";
?>