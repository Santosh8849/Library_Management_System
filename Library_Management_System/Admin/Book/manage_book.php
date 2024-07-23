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


    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script type="text/javascript" src="../../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            background-image: url("../images/manage_pic2.jpg");
            background-repeat: no-repeat;
            background-size: 100% 750px;
            background-color: #cccccc;
        }


        table {
            width: 100%;
            border: #000000;
            background-color: white;

        }

        .col-md-8 {
            overflow-x: auto;
            height: 400px;

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

    <br>
    <?php include '../../header.php'; ?>
    <br><br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Book&nbsp;Name</th>
                        <th>Author</th>
                        <th>Quantity</th>
                        <th>In&nbsp;Store</th>
                        <th>Assigned</th>
                        <th>Category</th>
                        <th>Number</th>
                        <th>Price</th>
                        <th><center>Action</center></th>
                    </tr>
                </thead>
                <?php
                $connection = mysqli_connect("localhost", "root", "", "lms");
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = 'SELECT books.book_id, books.book_name, books.author_name, books.instore, COUNT(issued_books.book_no) as assigned, books.cat_name, books.book_no, books.book_price FROM books LEFT JOIN issued_books ON books.book_no = issued_books.book_no GROUP BY books.book_name, books.author_name, books.instore, books.cat_name, books.book_no, books.book_price';
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    $instore = intval($row['instore']);
                    $assigned = intval($row['assigned']);
                    $available = $instore - $assigned;
                ?>
                    <tr>
                        <td><?php echo $row['book_name']; ?></td>
                        <td><?php echo $row['author_name']; ?></td>
                        <td><?php echo $row['instore']; ?></td>
                        <td><?php echo $available; ?> (Available)</td>
                        <td><?php echo $assigned; ?></td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td><?php echo $row['book_no']; ?></td>
                        <td><?php echo $row['book_price']; ?></td>
                        <td>
                            <center>
                                <button class="btn" name=""><a href="edit_book.php?bn=<?php echo $row['book_no']; ?>">Edit</a></button>
                                <button class="btn" name=""><a href="delete_book.php?bn=<?php echo $row['book_no']; ?>">Delete</a></button>
                            </center>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
</body>
</html>
