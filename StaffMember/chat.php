<?php
session_start();
if(!isset($_SESSION["Username"])){
    header("location:../index.php");

 } 

?>
<?php 

    require_once("../config/connection/access_db.php");

    $id = $conn->real_escape_string(trim($_SESSION['Username']));

     $r = $conn->query("SELECT * FROM account a INNER JOIN staff b ON a.StaffID = b.StaffID INNER JOIN chat c ON a.StaffID  = c.RecievedID where a.AccountID = '$id'") or die (mysqli_error());

    $row = $r->fetch_array();

     $StaffID = htmlentities($row['StaffID']);
     $RecievedID = htmlentities($row['RecievedID']);
     $name = htmlentities($row['Username']);
     $AccountType = htmlentities($row['AccountType']);
     

 ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- datatable lib -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>File management System</title>
    <style type="text/css">
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            padding: 0 10px;
            border-bottom: none;
        }


        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        #sidebar {
            /* don't forget to add all the previously mentioned styles here too */
            background: #7386D5;
            color: #fff;
            transition: all 0.3s;
        }



        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #6d7fcc;
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6d7fcc;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            border-radius: 4px;
            min-height: 48px;
            width: 90%;
        }
       #sidebar ul li.active>a, a[aria-expanded="true"] {
          color: #007bff; 
         background: #fff;
        }
    </style>

    <script>
        function submitchat2() {
            if (form1.Message.value == '') { //exit if one of the field is blank
                alert('Please Enter your message !');
                return;
            }
            var Message = form1.Message.value;
            var SenderID = form1.SenderID.value;
            var RecievedID = form1.SenderID.value;
            var AccountType = "Staff";


            console.log("========get SenderID=======");
            console.log(Message);
            console.log("========get Message=======");
            console.log(SenderID);
            console.log("========get RecievedID=======");
            console.log(RecievedID);
            console.log("========get AccountType=======");
            console.log(AccountType);
            var xmlhttp = new XMLHttpRequest(); //http request instance

            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('chatlogs2').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
                }
            }
            xmlhttp.open('GET', '../controllers/conversation_process.php?Message=' + Message + '&&SenderID=' + SenderID + '&&RecievedID=' + RecievedID + '&&AccountType=' + AccountType, true); //open and send http request

            xmlhttp.send();
        }
        $(document).ready(function(e) {
            console.log("========get SenderID=======");
            var StaffID = "<?php echo $StaffID; ?>";
            console.log(StaffID);
            $.ajaxSetup({
                cache: false
            });
            setInterval(function() {
                $('#chatlogs2').load('../controllers/logs.php?SenderID=' + StaffID);
            }, 2000);
        });
        window.onload = submitchat2();
        // window.location.reload(true);
    </script>

</head>

<body>
    <div class="container"><br>
        <div class="jumbotron" >
            <h1 class="display-6" align="center">DOCUMENT MANAGEMENT SYSTEM</h1>
            <!-- <h1 class="display-6" align="center">for RM-CARES</h1> -->
            <hr class="my-6" style="border-bottom: 1px solid #ffc107;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="nav navbar-nav flex-fill justify-content-center">
                        <a class="nav-link active" href="home.php" style="color: #007bff;"><i class="fas fa-home"></i><b>Home</b></a>
                        <a class="nav-link" href="profile.php" style="color: #007bff"><i class="fas fa-user"></i> Profile</a>
                       <!---notification bellow-->
                        <li>
                            <div class="dropdown mt-2" style="color:#007bff;">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i> Notification <i class="icon-angle-down"></i> <span class="badge badge-primary count" style="background-color: #007bff;color:#e8bab5">0</span>
                                </a>
                                <ul class="dropdown-menu" style="width: 300px!important;border: 1px solid #ccebe7;max-height: 250px!important;overflow: auto; overflow-x: hidden;z-index: 1;">
                                    <li class="dropdown" style=" background-color: #fff;">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"></span> </a>
                                        <ul class="dropdown-menus"></ul>
                                    </li>

                                    <li>
                                        <div class="cart-dropdown">
                                            <div class="cart-list" id="cart_product">
                                            </div>
                                            <div class="cart-btns" style="background-color:#04a1c5">
                                                <a href="notification.php" style="width:100%;color: #fff"><i class="fa fa-eye"></i> View Notification</a>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <!---end notification-->
                        <a class="nav-link" href="chat.php" style="color: #007bff"><i class="fas fa-envelope"></i> Chat</a>
                        <a class="nav-link" href="#" style="color: #007bff"><b>Welcome!,</b>
                            <font color="red"><?php echo ucwords(htmlentities($name)); ?></font>
                        </a><a class="nav-link" href="../controllers/logout.php" style="color: #007bff"><i class="fas fa-power-off"></i> Logout</a>
                    </div>
                </div>

            </nav><br>
            <!----chat---->
            <div class="container">
                <form name="form1" id="form">
                    <div class="messaging">
                        <div class="inbox_msg">
                            <div class="inbox_people">
                                <div class="headind_srch">
                                    <div class="recent_heading">
                                        <h4>Recent</h4>
                                    </div>
                                    <!-- <div class="srch_bar">
                                    <div class="stylish-input-group">
                                        <input type="text" class="search-bar" placeholder="Search">
                                        <span class="input-group-addon">
                                            <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                        </span>
                                    </div>
                                </div> -->
                                </div>

                                <div class="inbox_chat">
                                    <div class="chat_list active_chat">
                                        <?php
                               $rx = $conn->query("SELECT MAX(a.id) as id,FirstName,MiddleName,LastName,ImageURL,Message,Datetime_created,login_time,status FROM history_log a  INNER JOIN chat b ON a.id  = b.ChatID INNER JOIN staff c ON a.id  = c.StaffID  WHERE c.StaffID != '".$id."'  group by a.id DESC") or die (mysqli_error());

                            
                                 while($row = $rx->fetch_array()){
                                     $FirstName = htmlentities($row['FirstName']);
                                     $MiddleName = htmlentities($row['MiddleName']);
                                     $LastName = htmlentities($row['LastName']);
                                     $ImageURL = htmlentities($row['ImageURL']);
                                     $Message = htmlentities($row['Message']);
                                     $Datetime_created = date('M-d-Y | h:i A', strtotime($row['Datetime_created']));
                                     $login_time = date('M-d-Y | h:i A', strtotime($row['login_time']));
                                     $status = htmlentities($row['status']);


                                     if($status == 'Online'){
                                            $status =  "<img src='../Administrator/img/circle-n-carpet-cleaning-upland-green-dot-corporation-others-png-clip-art-thumbnail.png' height='20px' width='20px'>";
                                       }else{
                                             $status =  "<img src='../Administrator/img/circle-red-circle-png-clip-art-thumbnail.png' height='15px' width='15px'>";
                                         }

                                    ?>
                                        <div class="chat_people">

                                            <div class="chat_img"> <img src="../Administrator/image_upload/<?php echo $ImageURL;?>" alt="sunil" width="40" height="40" style="border-radius: 50% 50%"> </div>
                                            <div class="chat_ib">
                                                <h5><?php echo $FirstName .' '. $MiddleName.'. '.$LastName ;?> <span class="chat_date"><?php echo $status;?></span></h5>
                                                <p><?php echo $login_time;?></p>
                                            </div>

                                        </div>
                                        <hr>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                            <!----root---->
                            <div class="mesgs">
                                <div class="msg_history" id='scrollable'>
                                    <!---chat--->
                                    <div id="chatlogs2">
                                        <img src="../Administrator/img/Spinner-1.5s-165px.svg" style="width:60px;height:60px!important">LOADING PLEASE WAIT...
                                    </div>
                                    <!---end chat--->
                                </div>
                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <div class="row">
                                            <div class="col-4" style="display: none">
                                             <select class="form-control mt-2" class="form-control" alt="RecievedID" id="RecievedID" name="RecievedID" autocomplete="off">
                                                    <!--<option selected="true" disabled="disabled">Select Staff</option> -->
                                    <?php
                                     require_once("../config/connection/access_db.php");

                                    $sql = "SELECT  * FROM  staff WHERE StaffID != '".$StaffID."'";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_array()) {
                                        echo "<option value=\"" . htmlspecialchars($row['StaffID']) . "\">" . $row['FirstName'] . ' '. $row['MiddleName'] . '. '. $row['LastName'] . "</option>";
                                   }
                               ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <input type="text" class="write_msg" id="Message" name="Message" placeholder="Write Your message here..." alt="Message" placeholder="Type a message" />
                             <input type="hidden" name="SenderID" alt="SenderID" value="<?php echo $id;?>">
                            <button class="msg_send_btn"  type="button" style="margin-right: 4%"><i class="fa fa-paper-plane-o" id="sends" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!--end chat-->
    <hr class="my-1 pt-2 mt-5" style="border-top: 1px solid #ffc107;">
    <p align="center">Contact Administrator at Admin@gmail.com</p>
    <p align="center">All rights reserved 2021</p>
    </div>
    </div>
    </div>
    <!--scrolling chat after submit button-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sends').click(function() {
                $('#scrollable').animate({
                    scrollTop: $('#scrollable').prop('scrollHeight')
                }, 1000);
            });
        });
    </script>
    <!--end scrolling chat after submit button-->
    <script>
        $(document).ready(function() {
            $('#user_table').DataTable({
                "processing": true,
                "serverSide": true,
                "bStateSave": true,
                order: [
                    [0, 'desc']
                ],
                "ajax": "../controllers/fetchuser_process.php",

            });

        });
    </script>
   <!---notification bellow-->
    <script>
        $(document).ready(function() {
            function load_unseen_notification(view = '') {
                var StaffID = "<?php echo $StaffID;?>";
                $.ajax({
                    url: "../controllers/notification.php",
                    method: "POST",
                    data:{view:view, StaffID: StaffID},
                    dataType: "json",
                    success: function(data) {
                        $('.dropdown-menus').html(data.notification);
                        if (data.unseen_notification > 0) {
                            $('.count').html(data.unseen_notification);
                        }
                    }
                });
            }

            load_unseen_notification();

            $(document).on('click', '.dropdown-toggle', function() {
                $('.count').html('');
                load_unseen_notification('yes');
            });

            setInterval(function() {
                load_unseen_notification();;
            }, 2000);

        });
    </script>
   <!---end notification-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>