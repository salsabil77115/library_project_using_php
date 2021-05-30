<?php

$mysqli = new mysqli("localhost", 'salsabil', '8PihA2scEmJqJEIR', 'test');
$field1 = $mysqli->real_escape_string($_POST['name']);
$field2 = $mysqli->real_escape_string($_POST['email']);
$field3 = $mysqli->real_escape_string($_POST['id']);
$field4 = $mysqli->real_escape_string($_POST['phone']);
$field5 = $mysqli->real_escape_string($_POST['pwd1']);


$query ="UPDATE admin SET Name='$field1',email='$field2',phone='$field4',password='$field5'
where id='$field3'";
 
 $mysqli->query($query);
 if (mysqli_query($mysqli, $query)) {
    echo "<script>alert('Record updated successfully')</script>";
  } 

else {
    echo "<script>alert('Error updating record: '</script>" . mysqli_error($conn);}
$mysqli->close();
include 'adminpage.html';
exit();
?>