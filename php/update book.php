<?php

$mysqli = new mysqli("localhost", 'salsabil', '8PihA2scEmJqJEIR', 'test');
$field1 = $mysqli->real_escape_string($_POST['title']);
$field2 = $mysqli->real_escape_string($_POST['author']);
$field3 = $mysqli->real_escape_string($_POST['publisher']);
$field4 = $mysqli->real_escape_string($_POST['copies']);
$field5 = $mysqli->real_escape_string($_POST['ISBN']);




$query ="UPDATE book SET title='$field1',author='$field2',num_of_copies='$field3',publisher_year='$field4'
where ISBN='$field5'";
 
 $mysqli->query($query);
 if (mysqli_query($mysqli, $query)) {
    echo "Record updated successfully";
  } 

else {
    echo "Error updating record: " . mysqli_error($conn);}
$mysqli->close();
 include'adminpage.html';
 exit();
?>