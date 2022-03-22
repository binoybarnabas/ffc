<?php
 include 'header.php';
 include 'inc/dbh.inc.php';
?>
     
     <!--audio-->
     <!----
     <audio autoplay hidden>
       <source src="audio/ffcaudio.mp3" type="audio/mpeg">
     </audio>
     <--close audio-->

     <!--Landing-->
     <div id="home">
     	<div class="landingtxt">
     		<h1>Welcome to Food Court</h1>
     		<h3>Feeling Hungry?</h3>
     		<a class="btn btn-default btn-lg" href="login.php"><i class="fas fa-utensils"></i> Order Now</a>
     	</div>
     </div>
     <!--end Landing-->

     <!-- features-->
     <div id="features">
     	<div class="container">
     		<div class="row">
     			<div class="col-sm-4 text-center">
     				<img src="images/search.png" class="img-fluid">
     				<h2>Search Your Favourite</h2>
     				<p>Search your favourite food from the thousand of menu in the online.</p>
     			</div>
     			<div class="col-sm-4 text-center">
     				<img src="images/order.png" class="img-fluid">
     				<h2>Order Food Online</h2>
     				<p>Choose food and quantity form the menu. Place your order online</p>
     			</div>
     			<div class="col-sm-4 text-center">
     				<img src="images/deliver.png" class="img-fluid">
     				<h2>Lightning-Fast Delivery</h2>
     				<p>We have lightning fast delivery. we deliver food with the freshness</p>
     			</div>
     		</div>
     	</div>
     </div>
     <!--end features-->
     
     <!--grid-->
      <div id="grid">
      	<div class="container-fluid">
           <h3>Exclusive Cusines</h3>
      		<div class="row justify-content-center pt-2 pb-5">
            <?php
              $sql = "select * from foodlist order by fid desc limit 6;";
              $result = mysqli_query($con, $sql);
              $resultcheck = mysqli_num_rows($result);
              if ($resultcheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    
             ?>
      			<div class="col-lg-4 col-md-4 col-sm-12">
      				<div class="card text-center">  
               <img class="card-img-top img-fluid" style="height:300px;" src="uploads/<?php echo $row['fimage']; ?>" alt="food image">  
                      <div class="card-body">
                        <h4 class="card-title"><?php echo $row['fname']; ?></h4>
                         <p class="card-text"><?php echo $row['fdescription']; ?></p>
                         <a href="login.php" class="btn btn-default"><i class="fas fa-shopping-cart"></i> Buy Now</a>
                      </div>
       			    </div>
      		    </div>
      		   <?php
                }
              } else {
                echo " <div class='col-lg-4 col-md-4 col-12 text-center'>
              <div class='card' style='width:400px'>
                      <img class='card-img-top img-responsive' src='images/anton-porsche-4nHpGXcgq7I-unsplash.jpg' alt='Card image'>
                      <div class='card-body'>
                        <h4 class='card-title'>Sample</h4>
                         <p class='card-text'>Some example text.</p>
                         <a href='login.php' class='btn btn-default'><i class='fas fa-shopping-cart'></i> Buy Now</a>
                      </div>
                </div>
              </div>
              <div class='col-lg-4 col-md-4 col-12 text-center'>
              <div class='card' style='width:400px'>
                      <img class='card-img-top img-responsive' src='images/brooke-lark-HlNcigvUi4Q-unsplash.jpg' alt='Card image'>
                      <div class='card-body'>
                        <h4 class='card-title'>Sample</h4>
                         <p class='card-text'>Some example text.</p>
                         <a href='login.php' class='btn btn-default'><i class='fas fa-shopping-cart'></i> Buy Now</a>
                      </div>
                </div>
              </div>
              <div class='col-lg-4 col-md-4 col-12 text-center'>
              <div class='card' style='width:400px'>
                      <img class='card-img-top img-responsive' src='images/brooke-lark-4j059aGa5s4-unsplash.jpg' alt='Card image'>
                      <div class='card-body'>
                        <h4 class='card-title'>Sample</h4>
                         <p class='card-text'>Some example text.</p>
                         <a href='login.php' class='btn btn-default'><i class='fas fa-shopping-cart'></i> Buy Now</a>
                      </div>
                </div>
              </div>";
              }
             ?>

      	    </div>
         </div>
     </div>
     <!--end grid-->

      <!--contact-->
      <div id="contact">
      	<div class="con text-center p-4">
      		<p>Contact Us</p>
      	</div>
      	<div class="contact">
      		<form method="POST" action="inc/contact.inc.php">
      			<div class="form-group">
      				<label>Username</label>
      				<input type="text" name="name" autocomplete="off" class="form-control">
      			</div>
      			<div class="form-group">
      				<label>Email Id</label>
      				<input type="text" name="email" autocomplete="off" class="form-control">
      			</div>
      			<div class="form-group">
      				<label>Text</label>
      				<textarea class="form-control" name="txt"></textarea>
      			</div>
      			<button class="btn btn-default btn-md" name="submit">Submit</button>
      		</form>
      	</div>
      </div>
      <!--end contact-->
      
<?php
 include 'footer.php';
?>