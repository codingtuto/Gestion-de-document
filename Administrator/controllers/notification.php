<?php
      require_once("../config/connection/access_db.php");

          if(isset($_POST['view']) && isset($_POST['StaffID'])){
           $StaffID = $conn->real_escape_string(strip_tags($_POST["StaffID"]));

        if($_POST["view"] != ''){
            $update_query = "UPDATE `shared_file` SET status = 1 WHERE status=0";
            $conn->query($update_query);
        }
        $query = "SELECT * FROM `shared_file` a INNER JOIN `staff` b ON a.StaffID = b.StaffID WHERE a.StaffID = '$StaffID' ORDER BY a.sharedID DESC";
        $result = $conn->query($query);
        $output = '';
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
            $output .= '
           <li style="font-size:10px">
             <p>'.$row["FirstName"].' '.$row["MiddleName"].' '.$row["LastName"].' Shared File "'.$row["shared_filename"].'" <br>'.htmlentities(date('M-d-Y h:i A', strtotime($row["date_shared"]))).'</p>
           </li>

           ';
         }
      }else{
           $output .= '
           <li><a href="#" class="text-bold text-italic" style="color:#fff">No Notification Found</a></li>';
     }

    $status_query = "SELECT * FROM `shared_file` WHERE status=0";
    $result_query = $conn->query($status_query);
    $count = $result_query->num_rows;
    $data = array(
        'notification' => $output,
        'unseen_notification'  => $count
    );

    echo json_encode($data);

  }
?>