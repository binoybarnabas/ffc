<?php
if (isset($_POST['submit'])) {
	include "dbh.inc.php";
	session_start();

	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	if (empty($uname) || empty($pwd)) {
		
		header("Location: ../login.php?login=emptyfields");
		exit();
	} else {

		$sql = "select * from users where username = '$uname' and pwd = '$pwd';";
		$result = mysqli_query($con, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$_SESSION['u_name'] = $row['username'];
				$_SESSION['u_pwd'] = $row['pwd'];
				$_SESSION['u_id'] = $row['id'];
				header("Location: ../foodlist.php?login=success");
				exit();
			}
		} else {

			
			header("Location: ../login.php?login=invalidentry");

			exit();
		}
	}
} else {
	header("Location: ../index.php?login=invalidaccess");
	exit();
}
