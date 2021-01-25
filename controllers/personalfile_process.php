<?php
// connect to the database
require_once("../config/connection/access_db.php");
// Uploads files
if (isset($_POST['addfile'])) { // if save button on the form is clicked
    // name of the uploaded file
  $user = $_POST['FullName'];
  $StaffID = $_POST['StaffID'];

  

   $filename = $_FILES['FileName']['name'];
  //  $folderselect = $_POST['folderselect'];


  if ($_POST['variable'] == '')
    {
      $variable = './'; // default folder
    }
    else
    {
      $variable = $_POST['variable'] ;
    }
    $destination = "../Administrator/file_uploads/$variable".$filename; 

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['FileName']['tmp_name'];
    $size = $_FILES['FileName']['size'];


    if (!in_array($extension, ['docx', 'doc', 'pptx', 'ppt', 'xlsx', 'xls', 'pdf', 'odt'])) {

     echo '
          <script type = "text/javascript">
             alert("You file extension must be:  .docx .doc .pptx .ppt .xlsx .xls .pdf .odt");
            window.location = "/File_Management_System_2020/Administrator/Administrator/personal_file.php";
          </script>
        ';

    } elseif ($_FILES['FileName']['size'] > 2000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
       } else{
      $query = $conn->query("SELECT * FROM `personal_file` WHERE `FullName` = '$filename'")or die(mysqli_error($conn));
               $counter = $query->num_rows;           
                if ($counter == 1) { 
                 echo '
                      <script type = "text/javascript">
                          alert("Files already taken");
                        window.location = "/File_Management_System_2020/StaffMember/personal_file.php";
                      </script>
                    ';
                  } 
      
          date_default_timezone_set("asia/manila");
          $time = date("M-d-Y h:i A",strtotime("+0 HOURS"));

        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {


          date_default_timezone_set("asia/manila");
          $NOW = new DateTime();
          $date = $NOW->format('Y-m-d'); // return 2018-05-17

            $sql = "INSERT INTO personal_file (FileName, Size, DownLoad, TimeUpload, FullName, FilePath, Status,  Variable, StaffID, dates) VALUES ('$filename', $size, 0, '$time', '$user', '$destination', 'Staff', '$variable', '$StaffID', '$date')"; 
            if ($conn->query($sql)) {

                 echo '
                      <script type = "text/javascript">
                            alert("File Upload Successfully!!!");
                        window.location = "/File_Management_System_2020/StaffMember/personal_file.php";
                     </script>
                    ';
              }
          } else {
             echo "Failed Upload files!";
       }  
    }
}
