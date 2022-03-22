<?php
include 'inc/dbh.inc.php';

session_start();
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
	
	$grandtotal = 0;
	
    foreach ($_SESSION['cart'] as $key => $value) {
	//$fid = $value['item_fid'];
 	$fname = $value['item_fname'];
 	$fprice = $value['item_fprice'];
 	$fqty = $value['item_qty'];
 	$frestaurent = $value['item_frestaurent'];
 	$total = ($value['item_fprice'] * $value['item_qty']);
 	$user = $_SESSION['u_name'];
 	$orderdate = date('y-m-d');
 	$payment_type = 'cod';
 	//$res_status = 'waiting';
	$grandtotal = $grandtotal + ($value['item_qty'] * $value['item_fprice']);
}	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Food Court Order Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>
     
    <div class="container bg-light">
    	<div align="center" class="mt-5">
    		<h1 class="far fa-check-circle" style="font-size: 150px; color: green;"></h1>
    		<h1>Hurray! Your Order Has Been Placed Successfully</h1><br>
    		<h2>We Have Received Your Order and is currently in processing.</h2><br>
    		<!--<h3>Your Order ID - #32</h3><br>-->

    		<div class="row justify-content-center">
    			<div class="col-md-12">
    				<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-lg btn-success"><i class="fas fa-info-circle"></i> See Order Details</button>&nbsp;&nbsp;
    				<!----
    				<a href="/" class="btn btn-lg btn-primary"><i class="fas fa-biking"></i> Track Your Order</a>&nbsp;&nbsp;

             <button type="button" data-toggle="modal" data-target="#trackingmodel" class="btn btn-lg btn-primary"><i class="fas fa-biking"></i> Track Your Order</button>&nbsp;&nbsp;
    				--->
          
    			    <a href="foodlist.php?order=submitted" class="btn btn-lg btn-dark"><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
    			</div>
    		</div>
        <br>
         <h6>If you wish to cancell your order, You can <a type="button" data-toggle="modal" data-target="#cancelmodel" style="color: red;">cancel here</a></h6>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Current Order Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-responsive-md table-striped">
        	<thead>
        		<tr>
        			<!--<th>OrderID</th>-->
        			<th>Name</th>
        			<th>Food Item</th>
                    <th>Food IMG</th>
        			<th>Item Price</th>
        			<th>Quantity</th>
        			<th>Total Price</th>
        			<th>Grand Total</th>
        		</tr>
        		<tbody>
        			<?php
        			if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                     foreach ($_SESSION['cart'] as $key => $value) {
        			?>
        			<tr>
        			   <!--<td>#111</td>-->	
        			   <td><?php echo $_SESSION['u_name']; ?></td>
        			   <td><?php echo $value['item_fname']; ?></td>
                       <td><img src="uploads/<?php echo $value['item_img']; ?>" height='40px'></td>
        			   <td>&#8377; <?php echo $value['item_fprice']; ?></td>	
        			   <td><?php echo $value['item_qty']; ?></td>
        			   <td>&#8377; <?php echo $value['item_fprice'] * $value['item_qty']; ?></td>
        			 <?php
        			  }
        			 ?>  
        			   <td>&#8377; <?php echo $grandtotal; ?></td>
        			</tr>
        			<?php
                      }
        			?>
        		</tbody>
        	</thead>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Tracking 2-->
<div class="modal fade" id="trackingmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Current Order Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
             <div class="col-md-12">
                 <div>
                    <p><i class="fas fa-check-circle"> Order Confirmed</i>(10%)</p>
                    <p><i class="fas fa-user"> Waiting For Restaurent</i>(30%)</p>
                    <p><i class="fas fa-utensils"> Your Food is being preparing</i>(50%)</p>  
                    <p><i class="fas fa-truck"> Delivering Your Food</i>(80%)</p>
                    <p><i class="fas fa-check-square"> Food Delivered Successfully</i>(100%)</p>
                 </div>
                <?php
                 $user = $_SESSION['u_name'];
                 $sql = "SELECT * FROM foodorders WHERE ordereduser = '$user' ORDER BY orderid DESC LIMIT 1;";
                 $result = mysqli_query($con, $sql);
                 $resultcheck = mysqli_num_rows($result);
                 if ($resultcheck > 0) {
                   while ($row = mysqli_fetch_assoc($result)) {
                      $id = $row['orderid'];
                      //echo "<pre>";
                      //echo $id;
                      $secondsql = "SELECT * FROM foodorders WHERE orderid='$id';";
                      $secondresult = mysqli_query($con, $secondsql);
                      while ($rows = mysqli_fetch_assoc($secondresult)) {
                        $res = $rows['res_status'];
                        //echo $res;
                
                        if (isset($_GET['$res'])) {
                ?>
                           <div class="progress-bar progress-bar-striped progress-bar-animated bg-success active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                              10%
                           </div>
                <?php          
                        }
                        if ($res == 'waiting') {
                          $progress = '30%';
                          //echo $progress;
                ?>
                           <div class="progress-bar progress-bar-striped progress-bar-animated bg-success active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress; ?>">
                              <?php echo $progress; ?> (completed)
                           </div>
                <?php           
                        } elseif ($res == 'accept') {
                            $progress = '50%';
                ?>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress; ?>">
                              <?php echo $progress; ?> (completed)
                           </div>
                <?php            
                        } elseif ($res == 'shipped') {
                            $progress = '80%';
                ?>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress; ?>">
                              <?php echo $progress; ?> (completed)
                           </div>
                <?php 
                        }  elseif ($res == 'delivered') {
                             $progress = '100%';
                ?>
                            <div class="progress-bar bg-success active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress; ?>">
                               (Delivery completed)
                            </div>
                <?php             
                        }        
                   } 
                  }
                 }
                ?>
                
             </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
$user = $_SESSION['u_name'];
if (isset($_POST['submit'])) {
   $select = $_POST['select'];
   $reason = $_POST['reason'];

   //echo $user;
   if (!empty($select) OR !empty($reason)) {
     $sql = "select * from foodorders where ordereduser='$user' order by orderid desc limit 1;";
       $result = mysqli_query($con, $sql);
         while ($row = mysqli_fetch_assoc($result)) {
           $orderid = $row['orderid'];
           $res_status = $row['res_status'];
          //echo "<pre>";
           echo $orderid;

        if ($res_status == 'waiting') {
           
           $update = "DELETE FROM foodorders WHERE orderid = '$orderid';";
           mysqli_query($con, $update);

           echo "<script>alert('Your Food has been cancelled Successfully')</script>";
           echo "<script>window.location='foodlist.php?order=submitted'</script>";
     } else {
       echo "<p class='alert alert-danger'>Sorry, Your Food cannot be cancelled</p>";
     }
   }
   }else {
    echo "<p>Please select an option</p>";
   }
   
 } 
?>

<!--Cancel Modal -->
<div class="modal" tabindex="-1" role="dialog" id="cancelmodel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cancell Your Order Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h5>Cancell Your Order Here</h5>
<p class="alert alert-danger">Note:- You can cancel your food only if the restaurent hasn't started preparing the food</p>       
        <form method="POST">
          <div class="form-group">
            <label>Random Reason<span style="color: red;">*</span></label>
             <select class="form-control" name="select">
               <option>Wrong selection of food</option>
               <option>Wrong quantity of food</option>
               <option>Wrong Address Details</option>
             </select>
          </div><center>OR</center>
          <div class="form-group">
            <label>Custom Reason<span style="color: red;">*</span></label>
            <input class="form-control" type="text" name="reason" placeholder="enter the reason here">
          </div>
          <button class="btn btn-danger form-control" name="submit">Cancel Order</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php
//echo "<pre>";
//print_r($_SESSION);
?>
</body>
</html>