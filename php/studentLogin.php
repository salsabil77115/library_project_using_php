
<?php
$today=date("Y-m-d");
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
$uname=$_POST['email'];
$password=$_POST['password'];

$query1="SELECT dateBorrow FROM borrow  where studentEmail='$uname'";
$result1 = mysqli_query($conn, $query1) or die("Invalid query1");



    $sql="select * from student where email='$uname'AND password='$password' limit 1";
    
    $result = mysqli_query($conn, $sql) or die("Invalid query");
    
    if(mysqli_num_rows($result)==1){
        session_start();
$_SESSION["Email"] = "$uname";
$_SESSION["password"] = "$password";

$strInfo = "$uname::$password";
$cookie_name = "stdLogIn";
setcookie($cookie_name, $strInfo, time() + (86400 * 30));

        include 'studentPage.html';

       if (mysqli_num_rows($result1)) {
            $row = mysqli_fetch_row($result1);
            $history=$row[0];
    
        
         if($today>$history){
               echo"<script>alert('late borrower')</script>";
            }
           else if($today==$history)
           {echo"<script>alert('Should return your Borrow book today')</script>";}
           
           }
           
        exit();
    }
    else{
        echo"<script>alert('password invalid')</script>";

        include 'studentlogin.html';
        


        exit();
    

}

mysqli_close($conn);
?>

