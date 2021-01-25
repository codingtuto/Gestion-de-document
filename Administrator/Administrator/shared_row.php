<?php 
	 require_once("../config/connection/access_db.php");
	if(isset($_POST['PersonalFileID'])){
		$id = $conn->real_escape_string(strip_tags($_POST['PersonalFileID']));
		$sql = "SELECT * FROM `personal_file` WHERE PersonalFileID = '$id'"; 

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>