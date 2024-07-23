<?php
session_start();

if (!isset($_SESSION['email'])) {
?>
    <script type="text/javascript">
        alert("You are not Logged-in ");
        window.location.href = "../index.php";
    </script>
<?php
}

$connection = mysqli_connect("localhost", "root", "", "lms");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['mobile']) && isset($_POST['address'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    // Sanitize user input to prevent SQL injection
    $name = mysqli_real_escape_string($connection, $name);
    $mobile = mysqli_real_escape_string($connection, $mobile);
    $address = mysqli_real_escape_string($connection, $address);

    $query = "UPDATE users SET name='$name', mobile='$mobile', address='$address' WHERE email='$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
?>
        <script type="text/javascript">
            alert("Updated successfully!");
            window.location.href = "user_dashboard.php";
        </script>
<?php
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
} else {
?>
    <script type="text/javascript">
        alert("Error: Form submission required.");
        window.location.href = "user_dashboard.php";
    </script>
<?php
}
?>
