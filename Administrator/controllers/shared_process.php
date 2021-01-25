      <?php 
          require_once("../config/connection/access_db.php");
          $StaffID = $conn->real_escape_string(strip_tags($_POST['StaffID']));
          $shared_filename = $conn->real_escape_string(strip_tags($_POST['shared_filename']));
          $shared_size = $conn->real_escape_string(strip_tags($_POST['shared_size']));
          $shared_download = $conn->real_escape_string(strip_tags($_POST['shared_download']));
          $shared_timeupload = $conn->real_escape_string(strip_tags($_POST['shared_timeupload']));
          $shared_fullname = $conn->real_escape_string(strip_tags($_POST['shared_fullname']));
          $shared_status = $conn->real_escape_string(strip_tags($_POST['shared_status']));
          $shared_variable = $conn->real_escape_string(strip_tags($_POST['shared_variable']));
          $shared_id = $conn->real_escape_string(strip_tags($_POST['shared_id']));


            $insert = $conn->query("INSERT INTO `shared_file` (`StaffID`, `shared_filename`, `shared_size`, `shared_download`, `shared_timeupload`, `shared_fullname`, `shared_status`, `shared_variable`, `shared_id`) VALUES('$StaffID', '$shared_filename', '$shared_size', '$shared_download', '$shared_timeupload', '$shared_fullname', '$shared_status', '$shared_variable', '$shared_id')")or die(mysqli_error($conn));
            if($insert == TRUE){

                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong><i class="fa fa-check"></i>&nbsp;&nbsp;Shared File Successfully!</strong>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                   <script> setTimeout(function() {  window.history.go(-2); }, 1000); </script>
                </div>';
                         
               } else {

                    echo '
                        <script type = "text/javascript">
                          alert("Failed Shared File!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/shared.php";
                       </script>';
               }
            
      ?>
