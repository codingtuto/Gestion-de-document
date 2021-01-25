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

                                $r = $conn->query("SELECT * FROM  `account` a INNER JOIN staff b ON a.StaffID = b.StaffID WHERE a.AccountID = '$id'") or die ($conn->error());

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

            <!--start update profile-->
                <div class="col">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">User Profile</legend>
                        <form method="POST">
                            <div id="msgs"></div>
                            <div class="form-group">
                                <img src="<?php echo (!empty($row['ImageURL'])) ? '../image_upload/'.$row['ImageURL'] : 'images/495-4952535_create-digital-profile-icon-blue-user-profile-icon.png'; ?>" width="200px" height="200px" alt="Profile" class="img-thumbnail">
                                
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" alt="FirstName" value="<?php echo $row['FirstName'];?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" alt="MiddleName" value="<?php echo $row['MiddleName'];?>"  autocomplete="off">
                                    </div>

                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" alt="LastName" value="<?php echo $row['LastName'];?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <select type="text" class="form-control" id="Gender" value="<?php echo $row['Gender'];?>" autocomplete="off">
                                            <option value="<?php echo $row['Gender']; ?>" hidden><?php echo $row['Gender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" id="Birthdate" class="form-control" alt="BirthDate" value="<?php echo $row['BirthDate']; ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <select type="text" class="form-control" id="CivilStatus" value="<?php echo $row['CivilStatus'];?>" autocomplete="off">
                                            <option value="<?php echo $row['CivilStatus']; ?>" hidden><?php echo $row['CivilStatus']; ?></option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow/er">Widow/er</option>
                                            <option value="Married">Anulled</option>
                                            <option value="Legally Separated">Legally Separated</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" alt="Religion" value="<?php echo $row['Religion'];?>"  autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" alt="Nationality" value="<?php echo $row['Nationality'];?>"  autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" alt="Email" value="<?php echo $row['Email'];?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" maxlength="11" minlength="11" alt="ContactNo" class="form-control"value="<?php echo $row['ContactNo'];?>">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" alt="Address" value="<?php echo $row['Address'];?>"  placeholder="Complete Address">
                            </div>

                            <div class="row">
                             <div class="col-6">
                            <div class="form-group">
                           <select class="form-control" class="form-control" id="JobPosition" value="<?php echo $row['JobPosition']; ?>"  name="JobPosition" autocomplete="off">
                              <option value="<?php echo $row['JobPosition']; ?>" hidden><?php echo $row['JobPosition']; ?></option>
                                <?php
                                 require_once("../config/connection/access_db.php");
                                    $sql4 = "SELECT  Position FROM  job_postion";
                                    $result4 = $conn->query($sql4);
                                    while ($row4 = $result4->fetch_array()) {
                                        echo "<option value=\"" . htmlspecialchars($row4['Position']) . "\">" . $row4['Position'] . "</option>";
                                   }
                               ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <select class="form-control" class="form-control" value="<?php echo $row['Division']; ?>" id="Division" autocomplete="off">
                              <option value="<?php echo $row['Division']; ?>" hidden><?php echo $row['Division']; ?></option>
                                <?php
                                 require_once("../config/connection/access_db.php");
                                    $sql5 = "SELECT  DivisionName FROM  division";
                                    $result5 = $conn->query($sql5);
                                    while ($row5 = $result5->fetch_array()) {
                                        echo "<option value=\"" . htmlspecialchars($row5['DivisionName']) . "\">" . $row5['DivisionName'] . "</option>";
                                   }
                               ?>
                            </select>
                            </div>
                        </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" id="datehire" alt="DateHire" class="form-control" value="<?php echo $row['DateHire']; ?>" placeholder="Date hired" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" alt="JobDescription" value="<?php echo $row['JobDescription']; ?>" placeholder="Job Description" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <input type="hidden" class="form-control" alt="StaffID" value="<?php echo $row['StaffID']; ?>">
                                <button type="submit" class="btn btn-primary float-right" id="Updateall_staff" value="UPDATE">UPDATE</button>
                            </div>
                        </form>
                    </fieldset>
                </div>

            <!--end update profile-->

                <div class="col-7">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Users</legend>
                        <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#staticBackdrop">Add Member</button><hr>
                        <div class="table-responsive table-bordered">
                            <table id="staff_table" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Division</th>

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
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-user-plus"></i> Add Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <form action="../controllers/member_process.php" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                    <div class="form-group">
                        <input type="file" class="form-control" accept=".jpg, .jpeg, .png, .gif" name="ImageURL" placeholder="Upload Image" autocomplete="off">
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <input type="text" class="form-control" name="FirstName" placeholder="First Name" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="MiddleName" placeholder="Middle Name" autocomplete="off">
                            </div>

                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <input type="text" class="form-control" name="LastName" placeholder="Last Name" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <select type="text" class="form-control" name="Gender" autocomplete="off">
                                    <option selected="true" disabled="disabled">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Birthdate2" name="BirthDate" placeholder="Birthdate" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <select type="text" class="form-control" name="CivilStatus" autocomplete="off">
                                    <option selected="true" disabled="disabled">Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widow/er">Widow/er</option>
                                    <option value="Married">Anulled</option>
                                    <option value="Legally Separated">Legally Separated</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Religion"  placeholder="Religion" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Nationality" placeholder="Nationality" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name = "Email" placeholder="Email" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" maxlength="11" minlength="11" name="ContactNo" placeholder="Contact Number" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="Address" placeholder="Complete Address" autocomplete="off">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                           <select class="form-control" class="form-control" name="JobPosition" autocomplete="off">
                              <option selected="true" disabled="disabled">Select Job Position</option>
                                <?php
                                 require_once("../config/connection/access_db.php");
                                    $sql = "SELECT  Position FROM  job_postion";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_array()) {
                                        echo "<option value=\"" . htmlspecialchars($row['Position']) . "\">" . $row['Position'] . "</option>";
                                   }
                               ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <select class="form-control" class="form-control" name="Division" autocomplete="off">
                              <option selected="true" disabled="disabled">Select Division</option>
                                <?php
                                 require_once("../config/connection/access_db.php");
                                    $sql2 = "SELECT  DivisionName FROM  division";
                                    $result2 = $conn->query($sql2);
                                    while ($row2 = $result2->fetch_array()) {
                                        echo "<option value=\"" . htmlspecialchars($row2['DivisionName']) . "\">" . $row2['DivisionName'] . "</option>";
                                   }
                               ?>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="datehire2" name="DateHire" placeholder="Date hired" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="JobDescription" placeholder="Job Description" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    
                 </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addMem">Add Member</button>
              </div>
            </div>
            </form>
          </div>
        </div>
        <!---end modal add--->
        <hr class="my-1 pt-2 mt-5" style="border-top: 1px solid #ffc107;">
        <p align="center">Contact Administrator at Admin@gmail.com</p>
        <p align="center">All rights reserved 2021</p>
    </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#staff_table').DataTable({
                "processing": true,
                "serverSide": true,
                "bStateSave": true,
                order: [
                    [0, 'desc']
                ],
                "ajax": "../controllers/fetchstaff_process.php",

            });

        });
    </script>

  <script type="text/javascript">
   $(document).ready(function() {
   
    document.getElementById("Updateall_staff").addEventListener("click", (e) =>{
       e.preventDefault();

      const FirstName = document.querySelector('input[alt=FirstName]').value;
      const MiddleName = document.querySelector('input[alt=MiddleName]').value;
      const LastName = document.querySelector('input[alt=LastName]').value;
      var Gender = $('#Gender option:selected').val();  
      const BirthDate = document.querySelector('input[alt=BirthDate]').value;
      var CivilStatus = $('#CivilStatus option:selected').val(); 
      const Religion = document.querySelector('input[alt=Religion]').value;
      const Nationality = document.querySelector('input[alt=Nationality]').value;
      const Email = document.querySelector('input[alt=Email]').value;
      const ContactNo = document.querySelector('input[alt=ContactNo]').value;
      const Address = document.querySelector('input[alt=Address]').value;
      var JobPosition = $('#JobPosition option:selected').val(); 
      var Division = $('#Division option:selected').val(); 
      const DateHire = document.querySelector('input[alt=DateHire]').value;
      const JobDescription = document.querySelector('input[alt=JobDescription]').value;
      const StaffID = document.querySelector('input[alt=StaffID]').value;
   
         var delay = 100;
               var data = new FormData(this.form);
               data.append('FirstName', FirstName);
               data.append('MiddleName', MiddleName);
               data.append('LastName', LastName);
               data.append('Gender', Gender);
               data.append('BirthDate', BirthDate);
               data.append('CivilStatus', CivilStatus);
               data.append('Religion', Religion);
               data.append('Nationality', Nationality);
               data.append('Email', Email);
               data.append('ContactNo', ContactNo);
               data.append('Address', Address);
               data.append('JobPosition', JobPosition);
               data.append('Division', Division);
               data.append('DateHire', DateHire);
               data.append('JobDescription', JobDescription);
               data.append('StaffID', StaffID);

   
            $.ajax({
                url: '../controllers/EditAllstaff_process.php',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
   
                async: false,
                cache: false,
   
                success: function(data) {
                    setTimeout(function() {
                        $('#msgs').html(data);
                    }, delay);
                    setTimeout(location.reload.bind(location), 200);
   
                },
                error: function(data) {
                    console.log("Failed");
                }
            });
   
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