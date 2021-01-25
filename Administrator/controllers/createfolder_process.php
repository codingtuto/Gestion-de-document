<?php 
  require_once("../config/connection/access_db.php");
  error_reporting(0);
  if(isset($_POST['savefolder'])){

    $dirname = $_POST["FolderName"];
    $StaffID = $_POST["StaffID"];


    $Type = $_POST["Type"];

     $filename = "/{$dirname}/"; 

      $destination = "../file_uploads".$filename; 
   
    if (file_exists($destination)) { 

        echo "The directory {$destination} exists"; 

    } else { 

    mkdir("{$destination}", 0777); 


       $insert = $conn->query("INSERT INTO folder (FolderName, Type, StaffID) VALUES ('$destination','$Type','$StaffID')");

          if($insert == TRUE){
                        echo '
                        <script type = "text/javascript">
                          alert("Successfully Inserted!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/create_folder.php";
                        </script>';
                         
               } else {

                    echo '
                        <script type = "text/javascript">
                          alert("Failed Inserted!");
                          window.location = "/File_Management_System_2020/Administrator/Administrator/create_folder.php";
                       </script>';
              }

       } 
    }
?>