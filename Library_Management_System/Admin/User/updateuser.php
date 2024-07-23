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
$query = "UPDATE users SET name='$name', mobile='$mobile', address='$address' WHERE id = '" . $_SESSION['id'] . "'";
$query_run = mysqli_query($connection, $query);
?>
<script type="text/javascript">
    alert("Updated successfully!");
    window.location.href = "regusers.php";
</script>




