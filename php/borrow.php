
<?php
$mysqli = new mysqli("localhost", 'salsabil', '8PihA2scEmJqJEIR', 'test');

$field1 = $mysqli->real_escape_string($_POST['email']);
$field2 = $mysqli->real_escape_string($_POST['name']);
$field3 = $mysqli->real_escape_string($_POST['date']);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
  }
$query1="select * from borrow where nameBook='$field1' and studentEmail='$field2'";
$result1 = mysqli_query($mysqli, $query1) or die("Invalid query1");

if ($result1->num_rows > 0) {
  echo"<script>alert('you are already borrowed this book')</script>";
  include'borrow.html';
exit();
}
else{
  $query = "INSERT INTO borrow  VALUES ('{$field2}','{$field1}','{$field3}')";
  $result = mysqli_query($mysqli, $query) or die("Invalid query");
  include'studentPage.html';
echo"<script>alert('you borrow book that name:$field2')</script>";
  exit();
}

mysqli_close($mysqli);
        
?>