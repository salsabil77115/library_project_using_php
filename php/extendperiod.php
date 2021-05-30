<?php

 $servername = "localhost";
   $username = "salsabil";
   $password = "8PihA2scEmJqJEIR";
   $dbname="test";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $field1=$field2=$field3="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $field1 = test_input($_POST['x']);
   $field2=test_input($_POST['y']);
   $field3=test_input($_POST['z']);

 }

 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }  

$query1=" UPDATE borrow SET dateBorrow='$field3' where nameBook='$field1' And studentEmail='$field2'";

$result1 = mysqli_query($conn, $query1) or die("Invalid query1");

  echo"<script>alert('Extend Successfully')</script>";

  header('Location:studentPage.html');
  exit();



mysqli_close($conn);

  ?>