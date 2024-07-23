
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script src="./fetchform.js"></script>
<?php
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, "lms");
                    $rowq = "";
                    $bookno = "";
                    $bookid = "";
                    $bookname = "";
                    $bookauthor = "";
                    $bookcat = "";
                    $bookprice = "";
if(isset($_POST['book_id'])){
 $book_id = $_POST['book_id'];
$queryq = "select * from books WHERE book_no='$book_id'";
$resultq = mysqli_query($connection, $queryq);
$rowq = mysqli_fetch_array($resultq);
 $bid =  $rowq['book_id'];
 $bookno = preg_replace('/\s+/', '', strtolower($rowq['book_no']));
 $bookname =  preg_replace('/\s+/', '', strtolower($rowq['book_name']));
 $bookauthor =  preg_replace('/\s+/', '', strtolower($rowq['author_name']));
  $bookcat =   preg_replace('/\s+/', '', strtolower($rowq['cat_name']));
 $bookprice = preg_replace('/\s+/', '', strtolower($rowq['book_price']));
}
$bookcheck = "";


?>
<form action="fetch_book_info.php" method="POST" id="issuedb">
            <div class="form-group">
                <b><label>Book Name:</label></b>
                <select class="form-control" name="book_name" required>
                    <option value="" disabled selected>-Select Book-</option>
                    <?php

                    $query = "select book_name from books";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <option value="<?php echo $row['book_name']; ?>" <?php echo (strcmp(preg_replace('/\s+/', '', strtolower($row['book_name'])) ,$bookname) == 0) ? 'selected' : $bookcheck; ?>><?php echo $row['book_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <b><label>Book Author:</label></b>
                <select class="form-control" name="author_name" required>
                    <option value=""  >-Select author-</option>
                    <?php
                    $query = "select author_name from books";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        if(!empty($row['author_name'])){
                            
                            ?>
                     <option value="<?php echo $row['author_name']; ?>" <?php echo (strcmp(preg_replace('/\s+/', '', strtolower($row['author_name'])) , $bookauthor) == 0) ? 'selected' : $bookcheck; ?>><?php echo $row['author_name']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <b><label>Category:</label></b>
                <select class="form-control" name="cat_name" required>
                    <option value="">-Select Category-</option>
                    <?php
                    $query = "select cat_name from books";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        if(!empty($row['cat_name'])){
                            ?>
                            <option value="<?php echo $row['cat_name']; ?>"  <?php echo (strcmp(preg_replace('/\s+/', '', strtolower($row['cat_name'])),$bookcat) == 0) ? 'selected' : $bookcheck; ?>><?php echo $row['cat_name']; ?></option>
                        <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <b><label>Book Number:</label></b>
                <select class="form-control" name="book_no" id="book_no" required>
                    <option value="" disabled selected>-Select Number-</option>
                    <?php
                    $query = "select book_no, book_id from books";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <option value="<?php echo $row['book_no']; ?>" <?php echo (strcmp($row['book_no'],$bookno) == 0) ? 'selected' : $bookcheck; ?>><?php echo $row['book_no']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <b><label>Student ID:</label></b>
                <select class="form-control" name="student_id" required>
                    <option value="" disabled selected>-Select Student-</option>
                    <?php
                    $query = "select id from users";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <b><label>Issue Date:</label></b>
                <input type="text" name="issue_date" class="form-control" value="<?php echo date("d-m-Y"); ?>" required>
            </div>
            <br>
            <button class="btn btn-primary" type="submit" name="submit" value="submit" id="submit">Issue Book</button>
        </form>

        <?php
        
if (isset($_POST['submit'])) {
    $book_no = $_POST['book_no'];
    $student_id = $_POST['student_id'];

    $connection = mysqli_connect("localhost", "root", "", "lms");

    // Check if the book is already issued to the student
    $check_query = "SELECT * FROM issued_books WHERE book_no = '$book_no' AND student_id = '$student_id'";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        // If the book is already issued to the student, show an error message
        ?>
		<script type="text/javascript">
                alert("Book is already issued");
                window.location.href = "./issue_book.php";
            </script>
			<?php
    } else {
        // If the book is not already issued to the student, proceed with issuance
        $book_name = $_POST['book_name'];
        $author_name = $_POST['author_name'];
        $cat_name = $_POST['cat_name'];
        $issue_date = $_POST['issue_date'];

        // Modify the query to include the cat_name field
         $query = "INSERT INTO issued_books (book_no, book_name, author_name, cat_name, student_id, status, issue_date) 
        VALUES ('$book_no', '$book_name', '$author_name', '$cat_name', '$student_id', 1, '$issue_date')";

        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
?>
            <script type="text/javascript">
                $('#issuedb').css('display','none');
                alert("Book is issued");
                                $('#issuedb').css('display','none');
                window.location.href = "./issue_book.php";
            </script>
<?php
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
}
?>


