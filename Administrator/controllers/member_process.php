      <?php 
      // ob_start();
      error_reporting(0);
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      require_once("../config/connection/access_db.php");
      if (isset($_POST['addMem'])) {

          $FirstName = $conn->real_escape_string(strip_tags(ucfirst($_POST['FirstName'])));
          $LastName = $conn->real_escape_string(strip_tags(ucfirst($_POST['LastName'])));
          $MiddleName = $conn->real_escape_string(strip_tags(ucfirst($_POST['MiddleName'])));
          $gender = $conn->real_escape_string(strip_tags($_POST['Gender']));
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
 
          $file = addslashes(file_get_contents($_FILES['ImageURL']['tmp_name']));
          $file_name = addslashes($_FILES['ImageURL']['name']);
          $file_size = getimagesize($_FILES['ImageURL']['tmp_name']);
          move_uploaded_file($_FILES["ImageURL"]["tmp_name"], "../image_upload/" .date("Ymd").time().'_'. $_FILES["ImageURL"]["name"]);
          $ImageURL = "../image_upload/" .date("Ymd").time().'_'. $_FILES["ImageURL"]["name"];


            $insert = $conn->query("INSERT INTO `staff` (`FirstName`, `LastName`, `MiddleName`, `Gender`, `BirthDate`, `CivilStatus`, `Nationality`, `Religion`, `Address`, `ContactNo`, `Email`, `JobPosition`, `Division`, `DateHire`, `JobDescription`, `ImageURL`) VALUES('$FirstName', '$LastName', '$MiddleName', '$gender', '$BirthDate', '$CivilStatus', '$Nationality', '$Religion', '$Address', '$ContactNo', '$Email', '$JobPosition', '$Division', '$DateHire', '$JobDescription', '$ImageURL')")or die(mysqli_error($conn));
            if($insert == TRUE){
                        echo '
                        <script type = "text/javascript">
                          alert("Successfully Inserted!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/profile.php";
                        </script>';
                         
               } else {

                    echo '
                        <script type = "text/javascript">
                          alert("Failed Inserted!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/profile.php";
                       </script>';
              }
         }
      ?>
