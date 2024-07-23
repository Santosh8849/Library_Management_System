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
		#side_bar {
			background-color: whitesmoke;
			padding: 50px;
			width: 300px;
			height: 450 px;
		}

		body {
			background-image: url("../images/new_pic5.jpg");
			background-repeat: no-repeat;
			background-size: 100% 750px;
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
					<a href="./return_book.php" class="nav-link">
						Return Book</a>
				</li>
			</ul>
		</div>
	</nav>

	<br><br>
	<?php include '../../header.php'; ?><br>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
       <div id="issuebook_id"></div>
    </div>
    <div class="col-md-4"></div>
</div>
</body>
</html>



<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script src="./fetchAll.js"></script>