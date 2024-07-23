<?php
require('../function.php');
session_start();

if (!isset($_SESSION['email'])) {
?>
    <script type="text/javascript">
        alert("You are not Logged-in");
        window.location.href = "../index.php";
    </script>
<?php
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    // Your validation code goes here

    // Assuming you have validated the inputs, you can proceed to insert into the database
    $query = "INSERT INTO users (name, email, password, mobile, address) VALUES ('$name', '$email', '$password', '$mobile', '$address')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('User added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add user');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        #side_bar {
            background-color: whitesmoke;
            padding: 50px;
            width: 300px;
            height: 450px;
        }

        body {
            background-image: url("./images/xyz3.jpg");
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
                <a class="navbar-brand" href="admin_dashboard.php">Library Management System(LMS)</a>
            </div>
            <font style="color: white">
                <span><strong>WELCOME : <?php echo $_SESSION['name']; ?></strong></span>
            </font>
            <font style="color: white">
                <span><strong>EMAIL : <?php echo $_SESSION['email']; ?></strong></span>
            </font>

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_profile.php">
                            <img src="./images/view.png" width="30" height="30"> View Profile
                        </a>
                        <a class="dropdown-item" href="edit_profile.php">
                            <img src="./images/edit.png" width="30" height="30"> Edit Profile
                        </a>
                        <a class="dropdown-item" href="change_password.php">
                            <img src="./images/cpass.png" width="30" height="30"> Change Password
                        </a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Book</a>
                    <div class="dropdown-menu">
                        <a href="./Book/add_book.php" class="dropdown-item">Add New Book
                            <img src="./images/abook.png" width="30" height="30"></a>
                        <a href="./Book/manage_book.php" class="dropdown-item">Manage Book
                            <img src="./images/mbook.png" width="30" height="30"></a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                    <div class="dropdown-menu">
                        <a href="./Category/add_cat.php" class="dropdown-item">Add New Category
                            <img src="./images/acat.ico" width="30" height="30"></a>
                        <a href="./Category/manage_cat.php" class="dropdown-item">Manage Category
                            <img src="./images/mcat.png" width="30" height="30"></a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
                    <div class="dropdown-menu">
                        <a href="./Author/add_author.php" class="dropdown-item">Add New Author
                            <img src="./images/aauthor.png" width="25" height="25"></a>
                        <a href="./Author/manage_author.php" class="dropdown-item">Manage Author
                            <img src="./images/mauthor.png" width="30" height="30"></a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">User</a>
                    <div class="dropdown-menu">
                        <a href="./user/adduser.php" class="dropdown-item">Add User
                            <img src="./images/aauthor.png" width="25" height="25"></a>
                        <a href="./user/view_feedback.php" class="dropdown-item">User Feedback
                            <img src="./images/mauthor.png" width="30" height="30"></a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="./Book/issue_book.php" class="nav-link">Issue Book</a>
                </li>
                <li class="nav-item">
                    <a href="./Book/return_book.php" class="nav-link">Return Book</a>
                </li>
            </ul>
        </div>
    </nav>

    <br>

    <?php
// Define variables and initialize them as empty strings
$nameErr = $emailErr = $passwordErr = $mobileErr = $addressErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if name is empty
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // Other validation if needed
    }
    
    // Check if email is empty
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Other validation if needed
    }

    // Check if password is empty
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // Other validation if needed
    }

    // Check if mobile number is empty
    if (empty($_POST["mobile"])) {
        $mobileErr = "Mobile number is required";
    } else {
        $mobile = test_input($_POST["mobile"]);
        // Other validation if needed
    }

    // Check if address is empty
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
        // Other validation if needed
    }

    // Process the form data if there are no errors
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($mobileErr) && empty($addressErr)) {
        // Process the form data, e.g., add user to the database
        // Redirect to another page or display a success message
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
</body>

</html>
