<?php
 include "header.php";
?>
<div class="jumbotron">
	<h1>Want to become a Rider!</h1>
	<p class="pt-3" style="font-size: 21px;">Get started by creating your account</p>
</div>
   

   <div class="container">
   	<div class="row">
   	<div class="login col-md-6">

	   <?php
          if (isset($_GET['dsignup'])) {
            $errorcheck = $_GET['dsignup'];
            if ($errorcheck == "empty"){
              echo "<p class='text-center alert alert-danger'>You'll Need To Fill Up All The Details</p>";
            }
            if ($errorcheck == "char"){
              echo "<p class='text-center alert alert-danger'>Name Should Only Contain alphabets</p>";
            }
            if ($errorcheck == "user"){
              echo "<p class='text-center alert alert-danger'>Username Already Taken, Kindly Use a Different One</p>";
            }
            if ($errorcheck == "email"){
              echo "<p class='text-center alert alert-danger'>Enter a Valid Email Address</p>";
            }
            if ($errorcheck == "invalidcontact"){
              echo "<p class='text-center alert alert-danger'>Enter a Valid Contact Number</p>";
            }
            if ($errorcheck == "contact-alreadyexists"){
              echo "<p class='text-center alert alert-danger'>Contact Number Already Registered</p>";
            }
            if ($errorcheck == "checkemail"){
              echo "<p class='text-center alert alert-danger'>Email Address Already Registered</p>";
            }
          }
      ?>

   	  <form method="POST" action="inc/dsignup.inc.php" class="pb-5" enctype="multipart/form-data">
   	  	<legend style="border: 1px solid black; border-radius: 6px; color: black; font-size: 20px; font-weight: 500; margin: 0 auto;" class="pl-3 pr-3 pb-3 pt-1" >Create Account
      	<div class="form-group">
      	 <label>Full Name</label>
      		<input type="text" name="fname" autocomplete="off" placeholder="Your Full Name" class="form-control" >
      	</div>
      	<div class="form-group">
      	 <label>Username</label>
      		<input type="text" name="uname" autocomplete="off" placeholder="username" class="form-control" >
      	</div>
      	<div class="form-group">
      	 <label>Email</label>
      		<input type="text" name="email" autocomplete="off" placeholder="Email" class="form-control" >
      	</div>

      	<div>
      		<label>Blood Group</label>
      		<select class="form-control" name="blood" required>
      			<option>A+</option>
      			<option>B+</option>
      			<option>AB+</option>
      			<option>A-</option>
      			<option>B-</option>
      			<option>AB-</option>
      			<option>O+</option>
      			<option>O-</option>
      		</select>
      	</div>
        
        <div class="form-group">
      	 <label>Driving License Number</label>
      		<input type="text" name="dlicense" autocomplete="off" placeholder="License Number" class="form-control" >
      	</div>
  
      	<div class="form-group">
      	 <label>Contact No</label>
      		<input type="text" name="contact" autocomplete="off" placeholder="Contact Number" class="form-control" >
      	</div>
      	<div class="form-group">
      	 <label>Address</label>
      		<textarea name="address" autocomplete="off" placeholder="Your Address" class="form-control" ></textarea>
      	</div>

        <div class="form-group">
        	<label>Upload your Photo</label>
        	<input type="file" name="file" class="form-control" >
        </div>

      	<div class="form-group">
      	 <label>Password</label>
      	    <input type="password" name="pwd" autocomplete="off" placeholder="password" class="form-control" >
            <input type="hidden" name="status" value="no">
            <input type="hidden" name="dstatus" value="Not Ready">
      	</div>

      		<button class="btn btn-default btn-md" name="submit">Signup</button>
           <span class="pl-2 pr-2" style="font-weight: 700; font-size: 15px;">Or</span>
      		<a class="btn btn-default btn-md" href="dlogin.php">Login</a>
      	</legend>
      </form>
     </div>
     </div>
    </div>
<?php
 include "footer.php";
?>