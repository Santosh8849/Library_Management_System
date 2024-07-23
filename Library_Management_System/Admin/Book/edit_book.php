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

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
$book_no = "";
$book_name = "";
$author_name = "";
$cat_name = "";
$book_price = "";
$query = "SELECT * FROM books WHERE book_no = '$_GET[bn]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $book_name = $row['book_name'];
    $book_no = $row['book_no'];
    $author_name = $row['author_name'];
    $cat_name = $row['cat_name'];
    $book_price = $row['book_price'];
    $book_qty = $row['instore'];
}

?>
<!DOCTYPE html>

<html>

<head>


    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script type="text/javascript" src="../../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js"></script>
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
            background-image: url("../images/tbg1.jpg");
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

    <br><br>

    <?php include '../../header.php'; ?><br><br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="" method="post" id="updateForm" onsubmit="return validateForm()">
            <div class="form-group">
                <label>Book No:</label>
                <input type="text" name="book_no" value="<?php echo $book_no; ?>" class="form-control" required="" disabled>
            </div>
            <div class="form-group">
                <label>Book Name:</label>
                <input type="text" name="book_name" value="<?php echo $book_name; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Book Quantity:</label>
                <input type="text" name="book_qty" value="<?php echo $book_qty; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Author :</label>
                <select class="form-control" name="author_name" required>
                    <option>-Select Author-</option>
                    <?php
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, "lms");
                    $query = "select author_name from authors";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <option><?php echo $row['author_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>

            </div>
            <div class="form-group">
                <label>Category:</label>
                <select class="form-control" name="cat_name" required>
                    <option>-----------Select Category-------------</option>
                    <?php
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, "lms");
                    $query = "select cat_name from category";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <option><?php echo $row['cat_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Book Price:</label>
                <input type="text" name="book_price" value="<?php echo $book_price; ?>" class="form-control" required>
            </div><br>
            <button type="submit" class="btn btn-primary" name="update">
                Update Book
            </button>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
<script>
    function validateForm() {
        var authorName = document.forms["updateForm"]["author_name"].value;
        var catName = document.forms["updateForm"]["cat_name"].value;
        if (authorName === "-Select Author-" || catName === "-----------Select Category-------------") {
            alert("Please fill out all fields");
            return false;
        }
        return true;
    }
</script>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");

    $author_id = 0;
    $query1 = "SELECT author_id FROM authors WHERE author_name='$_POST[author_name]'";
    $query_run1 = mysqli_query($connection, $query1);
    while ($row = mysqli_fetch_assoc($query_run1)) {
        $author_id = $row['author_name'];
    }

    $cat_id = 0;
    $query2 = "SELECT cat_id FROM category WHERE cat_name='$_POST[cat_name]'";
    $query_run2 = mysqli_query($connection, $query2);
    while ($row = mysqli_fetch_assoc($query_run2)) {
        $cat_id = $row['cat_name'];
    }

    $query = "UPDATE books SET book_name = '$_POST[book_name]', author_name = '$_POST[author_name]', cat_name = '$_POST[cat_name]', instore='$_POST[book_qty]', book_price = '$_POST[book_price]' WHERE book_no = '$_GET[bn]'";
    $query_run = mysqli_query($connection, $query);
?>
    <script type="text/javascript">
        alert("Book is Updated");
        window.location.href = "../Book/manage_book.php";
    </script>
<?php
}

?>
