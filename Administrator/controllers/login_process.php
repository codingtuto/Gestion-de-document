<?php 

require_once("config/connection/access_db.php");

session_start();

if(isset($_POST["logIn"])){

 date_default_timezone_set("asia/manila");
 $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));
    

 $username = $conn->real_escape_string($_POST["Username"]);  
 $password = $conn->real_escape_string($_POST["Password"]);


$query = $conn->query("SELECT * FROM  account WHERE Username = '$username' AND AccountType = 'Admin'")or die($conn->error());
		$row = $query->fetch_array();
           $id = htmlentities($row['AccountID']);
           $user = htmlentities($row['Username']);

           $_SESSION["user_no"] = htmlentities($row["AccountID"]);
		   $_SESSION["Username"] = htmlentities($row["Username"]);
    
           $count = $query->num_rows;
            
		  	if ($count == 0) 
			  {	


               echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Invalid Username or Password!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
                    
                     header('Refresh: 1;url=/File_Management_System_2020/administrator/index.php');
			  } 
			  else
			  {
			  if(password_verify($password, $row["Password"]))  
                 {
				  $_SESSION['Username'] = $id;	

                setcookie ("Username", $username, time()+ (10 * 365 * 24 * 60 * 60));  
                setcookie ("password", $password,  time()+ (10 * 365 * 24 * 60 * 60));

              if (!empty($_SERVER["HTTP_CLIENT_IP"]))
				{
				 $ip = $_SERVER["HTTP_CLIENT_IP"];
				}
				elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
				{
				 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
				}
				else
				{
				 $ip = $_SERVER["REMOTE_ADDR"];
				}

				$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

                $remarks="Has LoggedIn the system at";
                $status="Online";   
                mysqli_query($conn,"INSERT INTO history_log(id,Username,actions,ip,host,login_time, status) VALUES('$id','$user','$remarks','$ip','$host','$date','$status')")or die(mysqli_error($conn));

               echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Login Successfully!!!!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
                    
                    header('Refresh: 1;url=/File_Management_System_2020/administrator/Administrator/home.php');

		         }


	  }
   }
?>

