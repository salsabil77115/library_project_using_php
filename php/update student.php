<?php

$mysqli = new mysqli("localhost", 'salsabil', '8PihA2scEmJqJEIR', 'test');
$field1 = $mysqli->real_escape_string($_POST['first']);
$field2 = $mysqli->real_escape_string($_POST['last']);
$field3 = $mysqli->real_escape_string($_POST['email']);
$field4 = $mysqli->real_escape_string($_POST['id']);
$field5 = $mysqli->real_escape_string($_POST['phone']);
$field6 = $mysqli->real_escape_string($_POST['pwd1']);


$query ="UPDATE student SET firstName='$field1',LastName='$field2',email='$field3',phone='$field5',password='$field6'
where id='$field4'";
$mysqli->query($query);
 if (mysqli_query($mysqli, $query)) {
    echo "<script>alert('Record updated successfully')</script>";
    include 'studentPage.html';

  } 

else {
    echo "Error updating record: " . mysqli_error($conn);}
$mysqli->close();
exit();
?>