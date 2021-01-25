
<?php
session_start();
  require_once("../config/connection/access_db.php");
  include 'time_ago.php';
if (isset($_REQUEST['SenderID'])) {
  $SenderID = $_REQUEST['SenderID'];
  $result = $conn->query("SELECT *, a.AccountType as AccountType FROM  chat a INNER JOIN staff b  ON a.SenderID = b.StaffID");
  while ($row = $result->fetch_assoc()) {

    $dateStr = date_create($row['Datetime_created']);
    $dateArray = date_format($dateStr, "m/d/Y h:i A");
    $ImageURL = $row['ImageURL'];
    $RecievedID = date_create($row['RecievedID']);
    $fullname = ucwords($row['FirstName'].' '.$row['MiddleName'].'. '.$row['LastName']);

     if ($row['AccountType'] == 'Admin' && $row['SenderID'] == $SenderID ) {

         echo '
            <div class="outgoing_msg">
              <div class="sent_msg">
              <span class="time_date"> '.$fullname.'</span>
                <p>' . ucfirst($row['Message']) . '</p>
                <span class="time_date"> '.$dateArray.' / ' . ucfirst(Time_Convert($row['Datetime_created'])) . '</span> </div>
            </div>
          ';

     }else {

          echo '
            <div class="incoming_msg">
              <div class="incoming_msg_img"><img src="../'.substr($ImageURL,3).'" alt="image" width="40" height="40" style="border-radius: 50% 50%">  </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <span class="time_date"> '.$fullname.'</span>
                   <p style="background: #2a9152 none repeat scroll 0 0;color:#fff">'. ucfirst($row['Message']) . '</p>
                  <span class="time_date"> '.$dateArray.' / ' . ucfirst(Time_Convert($row['Datetime_created'])) . '</span></div>
              </div>
            </div>
             ';
      }
   }
}

mysqli_close($conn);
