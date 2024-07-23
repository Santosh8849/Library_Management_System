<?php

require('../function.php');
session_start();

if (!isset($_SESSION['email'])) {
?>
    <script type="text/javascript">
        alert("You are not Logged-in ")
        window.location.href = "../../index.php";
    </script>
<?php
}


?>
<!DOCTYPE html>

<html>

<head>
    <style type="text/css">
        body {
            background-image: url("../images/new_pic6.jpg");
            background-repeat: no-repeat;
            background-size: 100% 750px;
            background-color: #cccccc;
        }

        .error {
            color: #FF0000;
        }
    </style>


    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script type="text/javascript" src="../../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="../images/abc1.jpeg" width="100" height="60"> &nbsp &nbsp
                <a class="navbar-brand" href="../admin_dashboard.php">Library Management System(LMS)</a>
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
                        <a class="dropdown-item" href="../view_profile.php">
                            <img src="../images/view.png" width="30" height="30">
                            View Profile

                        </a>
                        <a class="dropdown-item" href="../edit_profile.php">
                            <img src="../images/edit.png" width="30" height="30">
                            Edit Profile

                        </a>
                        <a class="dropdown-item" href="../change_password.php">
                            <img src="../images/cpass.png" width="30" height="30">
                            Change Password

                        </a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="../../logout.php">
                        Logout
                    </a></li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="../admin_dashboard.php" class="nav-link">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"> Book

                    </a>
                    <div class="dropdown-menu">
                        <a href="../Book/add_book.php" class="dropdown-item">Add New Book
                            <img src="../images/abook.png" width="30" height="30">
                        </a>
                        <a href="../Book/manage_book.php" class="dropdown-item">Manage Book &nbsp
                            <img src="../images/mbook.png" width="30" height="30">
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"> Category </a>
                    <div class="dropdown-menu">
                        <a href="../Category/add_cat.php" class="dropdown-item">Add New Category
                            <img src="../images/acat.ico" width="30" height="30">
                        </a>
                        <a href="../Category/manage_cat.php" class="dropdown-item">Manage Category &nbsp
                            <img src="../images/mcat.png" width="30" height="30">
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"> Author</a>
                    <div class="dropdown-menu">
                        <a href="../Author/add_author.php" class="dropdown-item">Add New Author
                            <img src="../images/aauthor.png" width="25" height="25">
                        </a>
                        <a href="../Author/manage_author.php" class="dropdown-item">Manage Author
                            <img src="../images/mauthor.png" width="30" height="30">
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"> User</a>
                    <div class="dropdown-menu">
                        <a href="./user/adduser.php" class="dropdown-item"> Add User
                            <img src="./images/aauthor.png" width="25" height="25"></a>
                            <a href="./user/view_feedback.php" class="dropdown-item"> User Feedback
                            <img src="./images/mauthor.png" width="30" height="30">
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="../Book/issue_book.php" class="nav-link">
                        Issue Book</a>
                </li>
                <li class="nav-item">
                    <a href="../Book/return_book.php" class="nav-link">
                        Return Book</a>
                </li>
            </ul>
        </div>
    </nav>

<?php
$book_name = $author_name = $cat_name = $book_no = $book_price = $instore = "";
$book_nameErr = $author_nameErr = $cat_nameErr = $book_noErr = $book_priceErr = $instoreErr = "";
$errors = array();
$cnt = 0;

if (isset($_POST['add_book'])) {
    $connection = mysqli_connect("localhost", "root", "", "lms");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $book_name = mysqli_real_escape_string($connection, $_POST["book_name"]);
    $author_name = mysqli_real_escape_string($connection, $_POST["author_name"]); // Corrected variable name
    $cat_name = mysqli_real_escape_string($connection, $_POST["cat_name"]); // Corrected variable name
    $book_no = mysqli_real_escape_string($connection, $_POST["book_no"]);
    $book_price = mysqli_real_escape_string($connection, $_POST["book_price"]);
    $instore = mysqli_real_escape_string($connection, $_POST["instore"]); // Added

    if (empty($book_name)) {
        $book_nameErr = "Book name is required";
    } else {
        $cnt++;
    }

    if (empty($author_name) || $author_name == "-Select Author-") {
        $author_nameErr = "Book author is required";
    } else {
        $cnt++;
    }

    if (empty($cat_name) || $cat_name == "-Select Category-") {
        $cat_nameErr = "Book category is required";
    } else {
        $cnt++;
    }

    if (empty($book_no)) {
        $book_noErr = "Book no. is required";
    } else {
        $cnt++;
    }

    if (empty($book_price)) {
        $book_priceErr = "Book price is required";
    } else {
        $cnt++;
    }

    if (empty($instore)) {
        $instoreErr = "Book quantity is required"; // Corrected variable name
    } else {
        $cnt++;
    }

    if ($cnt == 6) { // Changed the count to 6 as we have 6 fields
        $author_id = 0;
        $query1 = "SELECT author_id FROM authors WHERE author_name='$author_name'";
        $query_run1 = mysqli_query($connection, $query1);
        while ($row = mysqli_fetch_assoc($query_run1)) {
            $author_id = $row['author_id'];
        }

        $cat_id = 0;
        $query2 = "SELECT cat_id FROM category WHERE cat_name='$cat_name'";
        $query_run2 = mysqli_query($connection, $query2);
        while ($row = mysqli_fetch_assoc($query_run2)) {
            $cat_id = $row['cat_id'];
        }
        
        $insert_query = "INSERT INTO books (book_name, author_name, cat_name, book_no, instore, book_price) 
        VALUES ('$book_name', '$author_name', '$cat_name', $book_no, $instore, $book_price)";

        if (mysqli_query($connection, $insert_query)) {
            echo "<script>alert('Book added successfully');</script>";
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<div>$error</div>";
        }
    }

    mysqli_close($connection);
}
?>

<!-- Your HTML form goes here, corrected variable names in input fields -->



    <?php include '../../header.php'; ?><br>
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label>Book Name:</label>
                    <input type="text" name="book_name" class="form-control" required="">
                    <span class="error">* <?php echo $book_nameErr; ?></span>

                </div>
                <div class="form-group">
                    <label>Book Author:</label>
                    <!-- <input type="text" name="author_name" class="form-control" required=""> -->
                    <select class="form-control" name="author_name">
                        <option <?= $author_name == "-Select Author-" ? "selected" : ""; ?>>-Select Author-</option>
                        <?php
                        $connection = mysqli_connect("localhost", "root", "");
                        $db = mysqli_select_db($connection, "lms");
                        $query = "select author_name from authors";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                            <option <?= $author_name == $row['author_name'] ? "selected" : ""; ?>><?php echo $row['author_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <span class="error">* <?php echo $author_nameErr; ?></span>
                    <br>
                </div>

                <div class="form-group">
                    <label>Category Name:</label>
                    <!-- <input type="text" name="cat_name" class="form-control" required=""> -->
                    <select class="form-control" name="cat_name">
                        <option <?= $cat_name == "-Select Category-" ? "selected" : ""; ?>>-Select Category-</option>
                        <?php
                        $connection = mysqli_connect("localhost", "root", "");
                        $db = mysqli_select_db($connection, "lms");
                        $query = "select cat_name from category";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                            <option <?= $cat_name == $row['cat_name'] ? "selected" : ""; ?>><?php echo $row['cat_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <span class="error">* <?php echo $cat_nameErr; ?></span>
                </div>

                <div class="form-group">
                    <label>Book No:</label>
                    <input type="text" name="book_no" class="form-control" required="">
                    <span class="error">* <?php echo $book_noErr; ?></span>
                </div>

                <div class="form-group">
                    <label>Book Price:</label>
                    <input type="text" name="book_price" class="form-control" required="">
                    <span class="error">* <?php echo $book_priceErr; ?></span>
                </div>

                <div class="form-group">
                    <label>Book Quantity:</label>
                    <input type="text" name="instore" class="form-control" required="">
                    <span class="error">* <?php echo $instoreErr; ?></span>
                </div>
                <button class="btn btn-primary" name="add_book">Add Book</button>

            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>