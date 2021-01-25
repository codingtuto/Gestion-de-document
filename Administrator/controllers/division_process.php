      <?php 
      // ob_start();
      // error_reporting(0);
      // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      require_once("../config/connection/access_db.php");
      if (isset($_POST['adddiv'])) {

          $DivisionName = $conn->real_escape_string(strip_tags($_POST['DivisionName']));
          $DivisionAccronym = $conn->real_escape_string(strip_tags($_POST['DivisionAccronym']));


            $insert = $conn->query("INSERT INTO `division` (`DivisionName`, `DivisionAccronym`) VALUES('$DivisionName', '$DivisionAccronym')")or die($conn->error());
            if($insert == TRUE){
                        echo '
                        <script type = "text/javascript">
                          alert("Successfully Inserted!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/division.php";
                        </script>';
                         
               } else {

                    echo '
                        <script type = "text/javascript">
                          alert("Failed Inserted!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/division.php";
                       </script>';
              }
         }
      ?>
