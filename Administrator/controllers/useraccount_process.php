      <?php 
      // ob_start();
      error_reporting(0);
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      require_once("../config/connection/access_db.php");
      if (isset($_POST['addacc'])) {

          $StaffID = $conn->real_escape_string(strip_tags($_POST['StaffID']));
          $Username = $conn->real_escape_string(strip_tags($_POST['Username']));
          $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT, array('cost' => 12)); 
          $Status = $conn->real_escape_string(strip_tags($_POST['Status']));
          $AccountType = $conn->real_escape_string(strip_tags($_POST['AccountType']));



            $insert = $conn->query("INSERT INTO `account` (`StaffID`, `Username`, `Password`,  `Status`, `AccountType`) VALUES('$StaffID', '$Username', '$Password', '$Status', '$AccountType')")or die(mysqli_error($conn));
            if($insert == TRUE){
                        echo '
                        <script type = "text/javascript">
                          alert("Successfully Inserted!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/user_account.php";
                        </script>';
                         
               } else {

                    echo '
                        <script type = "text/javascript">
                          alert("Failed Inserted!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/user_account.php";
                       </script>';
              }
         }
      ?>
