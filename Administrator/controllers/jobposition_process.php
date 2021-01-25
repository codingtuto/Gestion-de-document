      <?php 
      // ob_start();
      // error_reporting(0);
      // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      require_once("../config/connection/access_db.php");
      if (isset($_POST['addjob'])) {

          $Position = $conn->real_escape_string(strip_tags($_POST['Position']));
          $Description = $conn->real_escape_string(strip_tags($_POST['Description']));


            $insert = $conn->query("INSERT INTO `job_postion` (`Position`, `Description`) VALUES('$Position', '$Description')")or die($conn->error());
            if($insert == TRUE){
                        echo '
                        <script type = "text/javascript">
                          alert("Successfully Inserted!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/job.php";
                        </script>';
                         
               } else {

                    echo '
                        <script type = "text/javascript">
                          alert("Failed Inserted!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/job.php";
                       </script>';
              }
         }
      ?>
