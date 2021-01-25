      <?php 
      // ob_start();
      error_reporting(0);
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      require_once("../config/connection/access_db.php");
      if (isset($_POST['StaffID'])) {

          $FirstName = $conn->real_escape_string(strip_tags(ucfirst($_POST['FirstName'])));
          $LastName = $conn->real_escape_string(strip_tags(ucfirst($_POST['LastName'])));
          $MiddleName = $conn->real_escape_string(strip_tags(ucfirst($_POST['MiddleName'])));
          $Gender = $conn->real_escape_string(strip_tags($_POST['Gender']));
          $BirthDate = $conn->real_escape_string(strip_tags($_POST['BirthDate']));
          $CivilStatus = $conn->real_escape_string(strip_tags($_POST['CivilStatus']));
          $Nationality = $conn->real_escape_string(strip_tags(ucfirst($_POST['Nationality'])));
          $Religion = $conn->real_escape_string(strip_tags(ucfirst($_POST['Religion'])));
          $Address = $conn->real_escape_string(strip_tags(ucfirst($_POST['Address'])));
          $ContactNo = $conn->real_escape_string(strip_tags($_POST['ContactNo']));
          $Email = $conn->real_escape_string(strip_tags($_POST['Email']));
          $JobPosition = $conn->real_escape_string(strip_tags($_POST['JobPosition']));
          $Division = $conn->real_escape_string(strip_tags($_POST['Division']));
          $DateHire = $conn->real_escape_string(strip_tags($_POST['DateHire']));
          $JobDescription = $conn->real_escape_string(strip_tags(ucfirst($_POST['JobDescription'])));
          $StaffID = $conn->real_escape_string(strip_tags(ucfirst($_POST['StaffID'])));
 


            $sql = $conn->query("UPDATE`staff` SET `FirstName` = '$FirstName', `LastName` = '$LastName', `MiddleName` = '$MiddleName', `Gender` = '$Gender', `BirthDate` = '$BirthDate', `CivilStatus` = '$CivilStatus', `Nationality` = '$Nationality', `Religion` = '$Religion', `Address` = '$Address', `ContactNo` = '$ContactNo', `Email` = '$Email', `JobPosition` = '$JobPosition', `Division` = '$Division', `DateHire` = '$DateHire', `JobDescription` = 'JobDescription' WHERE `StaffID` = '$StaffID'")or die(mysqli_error($conn));
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
