<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
$query = "delete from users where id = $_GET[bn]";
$query_run = mysqli_query($connection, $query);


?>
<script type="text/javascript">
    alert("user is Deleted...");
    window.location.href = "regusers.php";
</script>