<?php

$servername = "localhost";
$username = "salsabil";
$password = "8PihA2scEmJqJEIR";
$dbname="test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


    $email=$_POST['Email'];
    $password=$_POST['password'];


    $sql="select * from admin where email='$email'AND password='$password' limit 1";
    
    $result = mysqli_query($conn, $sql) or die("Invalid query");
   
    if(mysqli_num_rows($result)==1){
      session_start();
      $_SESSION["Email"] = "$email";
      $_SESSION["password"] = "$password";
       
      $cookie_name = "admLogin";
      $strInfo = "$email::$password";
      setcookie($cookie_name, $strInfo, time() + (86400 * 30), "/");
        include 'adminpage.html';
        exit();
    }
    else{
        include 'adminLogin.html';  
        echo"<script>alert('password invalid')</script>";

        exit();
}

mysqli_close($conn);
?>

