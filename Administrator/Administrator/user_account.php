<?php
session_start();
if(!isset($_SESSION["Username"])){
    header("location:../index.php");

 } 

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--       <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#Birthdate").datepicker();
        });
    </script>

    <script>
        $(function() {
            $("#datehire").datepicker();
        });
    </script>
        <script>
        $(function() {
            $("#Birthdate2").datepicker();
        });
    </script>

    <script>
        $(function() {
            $("#datehire2").datepicker();
        });
    </script>

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
      #sidebar ul li.active>a, a[aria-expanded="true"] {
          color: #007bff; 
         background: #fff;
        }
    </style>

</head>

<body>
    <div class="container"><br>
        <div class="jumbotron" >
             <h1 class="display-6" align="center">DOCUMENT MANAGEMENT SYSTEM</h1>
      <!--       <h1 class="display-6" align="center">for RM-CARES</h1> -->
            <hr class="my-6" style="border-bottom: 1px solid #ffc107;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
         
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="nav navbar-nav flex-fill justify-content-center">
                        <a class="nav-link active" href="home.php" style="color: #007bff;"><i class="fas fa-home"></i><b>Home</b></a>
                         <a class="nav-link" href="create_folder.php" style="color: #007bff;"><i class="fas fa-folder"></i> Folder</a>
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
                          <?php 

                                require_once("../config/connection/access_db.php");

                                $id = $conn->real_escape_string(trim($_SESSION['Username']));

                                $r = $conn->query("SELECT * FROM account where AccountID = '$id'") or die ($conn->error());

                                $row = $r->fetch_array();

                                 $name = htmlentities($row['Username']);
                                 $StaffID = htmlentities($row['StaffID']);
                            ?>
                  
                        <a class="nav-link" href="chat.php" style="color: #007bff"><i class="fas fa-envelope"></i> Chat</a>
                        <a class="nav-link" href="job.php" style="color: #007bff"><i class="fas fa-user"></i> Job</a>
                         <a class="nav-link" href="division.php" style="color: #007bff"><i class="fas fa-building"></i> Division</a>
                        <a class="nav-link" href="user_account.php" style="color: #007bff"><i class="fas fa-users"></i> User Accounts</a>
                        <a class="nav-link" href="#" style="color: #007bff"><b>Welcome!,</b><font color="red"><?php echo ucwords(htmlentities($name)); ?></font></a><a class="nav-link" href="../controllers/logout.php" style="color: #007bff"><i class="fas fa-power-off"></i> Logout</a>
                    </div>
                </div>
           
            </nav><br>
            <div class="row">
                <div class="col">
                </div>
      

                <div class="col-12">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Users Account Records</legend>
                        <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#staticBackdrop">Add Account</button><hr>
                        <div class="table-responsive table-bordered">
                            <table id="account_table" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th>AccountType</th>
                                        <th>Actions</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
   <!---modal add member-->
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-user-plus"></i> Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <form action="../controllers/useraccount_process.php" method="POST" >
                     <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                             <select class="form-control" class="form-control" name="StaffID" autocomplete="off">
                              <option selected="true" disabled="disabled">Select Staff</option>
                                <?php
                                 require_once("../config/connection/access_db.php");
                                    $sql = "SELECT  * FROM  staff";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_array()) {
                                        echo "<option value=\"" . htmlspecialchars($row['StaffID']) . "\">" . $row['FirstName'] . ' '. $row['MiddleName'] . '. '. $row['LastName'] . "</option>";
                                   }
                               ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Username" placeholder="Username" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                              <input type="password" class="form-control"  name="Password" placeholder="Password" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                              <input type="text" class="form-control"  name="Status" value="1" placeholder="1" autocomplete="off" readonly="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <select type="text" class="form-control" name="AccountType" autocomplete="off">
                                    <option selected="true" disabled="disabled">Select Type</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
       
                    
                 </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addacc">Add Account</button>
              </div>
            </div>
            </form>
          </div>
        </div>
        <!---end modal--->
        <hr class="my-1 pt-2 mt-5" style="border-top: 1px solid #ffc107;">
        <p align="center">Contact Administrator at Admin@gmail.com</p>
        <p align="center">All rights reserved 2021</p>
    </div>
    </div>
    </div>
   <?php include 'modal/Editaccount_modal.php';?>
    <script>
        $(document).ready(function() {
            $('#account_table').DataTable({
                "processing": true,
                "serverSide": true,
                "bStateSave": true,
                order: [
                    [0, 'desc']
                ],
                "ajax": "../controllers/fetchaccount_process.php",

            });

        });
    </script>

<script>
    $(document).ready(function() {

        load_data();

        var count = 1;

        function load_data() {
            $(document).on('click', '.Edit_image', function(e) {
                e.preventDefault();
                $('#image_edit').modal('show');
                var item_id = $(this).attr("data-image");
               getimageID(item_id);
            });
        }

        function getimageID(item_id) {
            $.ajax({
                type: 'POST',
                url: 'item_row3.php',
                data: {
                    item_id: item_id
                },
                dataType: 'json',
                success: function(response) {
                    $('#edits_id').val(response.item_id);
                    $('#edits_itemimage').attr("src", response.item_image.slice(3));
                }
            });
        }
     });
</script>
<script>
    $(document).ready(function() {

        load_data();

        var count = 1;

        function load_data() {
            $(document).on('click', '.edit', function(e) {
                e.preventDefault();
                $('#editaccount').modal('show');
                var AccountID = $(this).attr("id-data");
                getiID(AccountID);
            });
        }

        function getiID(AccountID){
            $.ajax({
                type: 'POST',
                url: 'accountedit_row.php',
                data: {
                    AccountID: AccountID
                },
                dataType: 'json',
                success: function(response) {
                    $('#edit_id').val(response.AccountID);
                    $('#edit_fullname').val(response.FirstName+' '+response.MiddleName+'. '+response.LastName);
                    $('#edit_username').val(response.Username);
                    $('#edit_status').val(response.Status);
                    $('#edit_accounttype').val(response.AccountType);

                }
            });
        }
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