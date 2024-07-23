<?php
$connection = mysqli_connect("localhost", "root", "", "lms");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['book_no'])) {
    $book_no = $_GET['book_no'];
    $query = "SELECT book_name, author_id, cat_id FROM books WHERE book_no = '$book_no'";
    $query_run = mysqli_query($connection, $query);
    if ($row = mysqli_fetch_assoc($query_run)) {
        $response = array(
            'book_name' => $row['book_name'],
            'author_id' => $row['author_id'],
            'cat_id' => $row['cat_id']
        );
        echo json_encode($response);
    }
}
?>
