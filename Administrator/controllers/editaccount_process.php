<?php
     error_reporting(0);
	  require_once("../config/connection/access_db.php");
    if(isset($_POST['AccountID'])){
		$Status = $conn->real_escape_string(strip_tags($_POST['Status']));
		$AccountID = $conn->real_escape_string(strip_tags($_POST['AccountID']));
    

		$sql = $conn->query("UPDATE `account` SET `Status` = '$Status' WHERE AccountID = '$AccountID'");
      if ($sql == TRUE) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong><i class="fa fa-check"></i>&nbsp;&nbsp;Update Successfully!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
               <script> setTimeout(function() {  window.history.go(-2); }, 1000); </script>
            </div>';
      } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong><i class="fa fa-times"></i>;&nbsp;Update Failed!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
         </div>';
      }	
  }
?>