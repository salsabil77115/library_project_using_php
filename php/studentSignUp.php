
<?php
session_start();
$mysqli = new mysqli("localhost", 'salsabil', '8PihA2scEmJqJEIR', 'test');
$field1 = $mysqli->real_escape_string($_POST['first']);
$field2 = $mysqli->real_escape_string($_POST['last']);
$field3 = $mysqli->real_escape_string($_POST['email']);
$field4 = $mysqli->real_escape_string($_POST['id']);
$field5 = $mysqli->real_escape_string($_POST['phone']);
$field6 = $mysqli->real_escape_string($_POST['pwd1']);

$strInfo = "$field3::$field6";
    $cookie_name = "SignUP";
setcookie($cookie_name, $strInfo, time() + (86400 * 30));

$_SESSION["Email"] = "$field3";
$_SESSION["password"] = "$field6";
$query = "INSERT INTO student VALUES ('{$field1}','{$field2}','{$field3}','{$field4}','{$field5}','{$field6}')";
$mysqli->query($query);

$mysqli->close();
 include 'studentPage.html';
 echo"<script>alert('sign up successfully')</script>";

 exit();
?>
