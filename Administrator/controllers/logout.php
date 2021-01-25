<?php

   require_once("../config/connection/access_db.php");

	session_start();
	date_default_timezone_set("asia/manila");
	$time = date("M-d-Y h:i A",strtotime("+0 HOURS"));

	 $user = $_SESSION['Username'];
	 setcookie ("Username", $user, time()+ (10 * 365 * 24 * 60 * 60));   
	$status="Offline";
	mysqli_query($conn,"UPDATE history_log SET `login_time` = '$time', `status` = '$status'  WHERE `id` = '$user'");

	$_SESSION = NULL;
	$_SESSION = [];
	session_unset();
	session_destroy();

	echo "<script type='text/javascript'>alert('LogOut Successfully!');
		 document.location='../index.php'</script>";


?>

