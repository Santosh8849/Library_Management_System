<?php
session_start();


if (!isset($_SESSION['email'])) {
?>
    <script type="text/javascript">
        alert("You are not Logged-in ")
        window.location.href = "../index.php";
    </script>
<?php
}

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
$id = "";
$name = "";
$email = "";
$mobile = "";
$address = "";
$query = "select * from users where id = '$_SESSION[id]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $address = $row['address'];
}

?>
<!DOCTYPE html>

<html>

<head>


    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        #side_bar {
            background-color: whitesmoke;
            padding: 50px;
            width: 300px;
            height: 450 px;

        }

        body {
            background-image: url("./images/final3.jpg");
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
                <img src="./images/abc1.jpeg" width="100" height="60"> &nbsp &nbsp
                <a class="navbar-brand" href="user_dashboard.php">Library Management System(LMS)</a>
            </div>
            <font style="color: white">
                <span>
                    <strong>
                        WELCOME : <?php echo $_SESSION['name']; ?></strong>
                </span>
            </font>
            <font style="color: white">
                <span>
                    <strong>
                        EMAIL : <?php echo $_SESSION['email']; ?></strong>
                </span>
            </font>

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                        My Profile
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_profile.php">
                            <img src="./images/view.png" width="30" height="30">
                            View Profile

                        </a>
                        <a class="dropdown-item" href="edit_profile.php">
                            <img src="./images/edit.png" width="30" height="30">
                            Edit Profile

                        </a>
                        <a class="dropdown-item" href="change_password.php">
                            <img src="./images/cpass.png" width="30" height="30">
                            Change Password

                        </a>
                        </a>
                        <a class="dropdown-item" href="feedback.php">
                            <img src="./images/cpass.png" width="30" height="30">
                            Feedback

                        </a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="../logout.php">
                        Logout
                    </a></li>
            </ul>
        </div>
    </nav><br>

    <?php include '../header.php'; ?><br>
    <b>
        <div class="row">
            <div class="col-md-4"> </div>
            <div class="col-md-4" style="background-color: rgb(197, 56, 51); padding: 30px">

                <form>
                <div class="form-group">
                        <label>Student Id: </label><br><br>
                        <input type="text" class="form-control" value="<?php echo $id; ?>" disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Name: </label><br><br>
                        <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Email: </label><br><br>
                        <input type="text" class="form-control" value="<?php echo $email; ?>" disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Mobile: </label><br><br>
                        <input type="text" class="form-control" value="<?php echo $mobile; ?>" disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Address: </label><br><br>
                        <textarea rows="3" cols="40" disabled="" class="form-control"><?php echo $address; ?></textarea>
                    </div>
                </form>

            </div>
        </div>
    </b>





</body>

</html>