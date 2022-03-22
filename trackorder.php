<?php
include 'inc/dbh.inc.php';
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

    		<div class="row justify-content-center">
    			<div class="col-md-12">
    				<div>
                    <p><i class="fas fa-check-circle"> Order Confirmed</i>(10%)</p>
                    <p><i class="fas fa-user"> Waiting For Restaurent</i>(30%)</p>
                    <p><i class="fas fa-utensils"> Your Food is being preparing</i>(50%)</p>  
                    <p><i class="fas fa-truck"> Delivering Your Food</i>(80%)</p>
                    <p><i class="fas fa-check-square"> Food Delivered Successfully</i>(100%)</p>
            </div>
            
            <?php
              
              if (isset($_GET['orderid'])) {
                $orderid = $_GET['orderid'];
                $ordereduser = $_GET['user'];

                $sql = "SELECT res_status FROM foodorders WHERE orderid = '$orderid';";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                   $res = $row['res_status'];
                   //echo $res;

                   if (isset($_GET['$res'])) {
                   ?>
                     <div class="progress-bar progress-bar-striped progress-bar-animated bg-success active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                              10%
                     </div>
                   <?php  
                   } 
                   if ($res == "waiting") {
                    $progress = '30%';
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
                   } elseif ($res == "shipped") {
                     $progress = '80%';
                  ?>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress; ?>">
                              <?php echo $progress; ?> (completed)
                           </div>
                  <?php           
                   } elseif ($res == "delivered") {
                     $progress = '100%';
                  ?>
                            <div class="progress-bar bg-success active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress; ?>">
                               (Delivery completed)
                            </div>
                  <?php          
                   }
                }
              }
    
            ?>
             

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