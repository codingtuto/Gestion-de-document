<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

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
    </style>
</head>

<body>
    <div class="container"><br>
        <div class="jumbotron" style="background-color: #e3d6ba">
             <h1 class="display-6" align="center">DOCUMENT MANAGEMENT SYSTEM</h1>
      <!--       <h1 class="display-6" align="center">for RM-CARES</h1> -->
            <hr class="my-6" style="border-bottom: 1px solid #ffc107;">
            <div class="row">
                <div class="col">
                </div>
                <div class="col-5">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">User Login</legend>
                        <form action="" method="POST">
                            <?php include 'controllers/login_process.php';?>
                            <div class="form-group">
                                <input type="text" class="form-control"  name="Username" placeholder="Username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="Password" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" name = "logIn" value="LOGIN">LOGIN</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <div class="col">
                </div>
            </div>
            <hr class="my-1 pt-2 mt-5" style="border-top: 1px solid #ffc107;">
            <p align="center">Contact Administrator at Admin@gmail.com</p>
            <p align="center">All rights reserved 2021</p>
        </div>

    </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>