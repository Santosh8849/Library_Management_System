<!DOCTYPE html>

<html>

<head>




    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
    <!-- <script type="text/javascript" src="bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js"></script> -->
    <style type="text/css">
        #side_bar {
            background-color: whitesmoke;
            padding: 50px;
            width: 300px;
            height: 450 px;
        }

        body {
            background-image: url("./images/lib.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #cccccc;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="./images/abc1.jpeg" width="100" height="60">
                <a class="navbar-brand" href="index.php">Library Management System(LMS)</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="./Admin/admin.php">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./User/user_login.php">User Login</a>
                </li>

            </ul>
        </div>
    </nav><br>



    <?php include 'header.php'; ?>

    <div class="row">

        <div class="col-md-4" id="side_bar">
            <h5>Library Timing</h5>
            <ul>

                <li>Opening Timing:8:00 AM</li>
                <li>Closing Timing:8:00 PM</li>
                <li>(Sunday Off)</li>
            </ul>
            <h5>What we Provide</h5>
            <ul>

                <li>Full Ferniture</li>
                <li>Free Wi-Fi</li>
                <li>News Paper</li>
                <li>Discussion Room</li>
                <li>RO Water</li>
                <li>Peacefull Environment</li>
            </ul>
        </div>

</body>

</html>