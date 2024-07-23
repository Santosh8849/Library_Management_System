<!DOCTYPE html>

<html>
<?php
require('.././Admin/function.php');
?>

<head>
    <style>
        .error {
            color: #FF0000;
        }

        body {
            background-image: url("./images/bpic1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #cccccc;
        }
    </style>

    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="user_login.css">
    <!-- <script type="text/javascript" src="bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js"></script> -->

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="./images/abc1.jpeg" width="100" height="60"> &nbsp &nbsp
                <a class="navbar-brand" href="../index.php">Library Management System(LMS)</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="../Admin/admin.php">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_login.php">User Login</a>
                </li>

            </ul>
        </div>
    </nav><br>

    <?php include '../header.php'; ?>


    <?php
    session_start();
    $emailErr = $passwordErr = "";
    if (isset($_POST['login'])) {
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "lms");


        $cnt = 0;
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            } else {
                $cnt++;
            }
        }


        if ($cnt == 1) {
            $query = "select * from users where email = '$email'";
            $query_run = mysqli_query($connection, $query);
            $cnt = 0;
            while ($row = mysqli_fetch_assoc($query_run)) {
                if ($row['email'] == $_POST['email']) {
                    if ($row['password'] == $_POST['password']) {
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['id'] = $row['id'];
                        header("Location:user_dashboard.php");
                    } else {
    ?>
                        <br><br>
                        <center><span class="alert-danger">Wrong Password</span></center>

                <?php
                    }
                    $cnt = 1;
                }
            }
            if ($cnt === 0) {
                ?>
                <br><br>
                <center><span class="alert-danger">Wrong Email</span></center>
    <?php
            }
        }
    }
    ?>






    <div class="registration-form">



        <form action="" method="post">

            <center>
                <h3>User Login Form</h3>
            </center>
            <br><br>
            <div class="form-group">


                <input type="text" name="email" placeholder="Email" class="form-control item" required>
                <span class="error">&emsp;<?php echo $emailErr; ?></span>

            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control item" required>
            </div>
            <button type="submit" name="login" class="btn btn-block create-account">Login</button>
            <div class="notuser">
                <label>Not a user then? <a href="../signup.php">Register</a></label>
            </div>
        </form>
    </div>
    <!-- <div class="form-group">
                <input type="text" class="form-control item" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Password">
            </div> -->

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>