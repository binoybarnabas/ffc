<?php
  session_start();
  if (!isset($_SESSION['u_name'])) {
  	 header("Location: ../index.php?type=invalidentry");
     exit();
  } else {
 include "dbh.inc.php";
 $id = $_GET['id'];
 $sql = "delete from foodlist where fid = '$id'";
 mysqli_query($con, $sql);

 header("Location: ../mdeletefood.php?delete=success");
 exit();

}
