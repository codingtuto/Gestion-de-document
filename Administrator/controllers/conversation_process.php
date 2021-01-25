
<?php
  require_once("../config/connection/access_db.php");
session_start();
	
$Message = $_REQUEST['Message'];
$SenderID = trim($_REQUEST['SenderID']);
$RecievedID = trim($_REQUEST['RecievedID']);
$AccountType = trim($_REQUEST['AccountType']);

date_default_timezone_set("asia/manila");
$msg_datetime = date('Y-m-d H:i:s', strtotime("+0 HOURS"));

$conn->query("INSERT INTO chat (SenderID, RecievedID, Message, AccountType,  Datetime_created) VALUES('$SenderID', '$RecievedID', '$Message', '$AccountType','$msg_datetime')");

    $result = $conn->query("SELECT * FROM chat ORDER BY ChatID DESC");

mysqli_close($conn);
?>
