<?php
require('./Admin/function.php');
$connection = mysqli_connect("localhost", "root", "", "lms");
$db = mysqli_select_db($connection, "lms");
// if($connection)echo "Database is connected";
// else echo"Problem Occured";


$nameErr = "";
$cnt = 0;

if (empty($_POST["name"])) {
    $nameErr = "Name is required";
} else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
        // exit();
    } else {
        $name = test_input($_POST["name"]);
        $cnt = 1;
    }
}


if ($cnt == 1) {
    $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile],'$_POST[address]')";
    $mysql_run = mysqli_query($connection, $query);
}
?>

<?php if ($cnt == 1) { ?>
    <script type="text/javascript">
        alert("Registration is successfull ... You may login now.")
        window.location.href = "./index.php";
    </script>

<?php } ?>

