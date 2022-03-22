<?php
 
  if (isset($_POST['submit'])) {
  	session_start();
  	session_unset();
  	session_destroy();

  	header("Location:../../../ffc/admin/index.php?logout=success");
  	exit();
  } else {
  	header("Location: ../../../ffc/index.php");
  	exit();
  }