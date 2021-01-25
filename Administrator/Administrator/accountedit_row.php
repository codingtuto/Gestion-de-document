<?php 
	require_once("../config/connection/access_db.php");
	if(isset($_POST['AccountID'])){
		$id = $conn->real_escape_string(strip_tags($_POST['AccountID']));
		$sql = "SELECT * FROM `account` a INNER JOIN staff b ON a.StaffID = b.StaffID WHERE a.AccountID = '$id'"; 

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>