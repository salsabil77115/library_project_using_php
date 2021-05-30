<html>
   <head>
      <title>return page</title>
   </head>
   <body>
   <?php
   $servername = "localhost";
   $username = "salsabil";
   $password = "8PihA2scEmJqJEIR";
   $dbname="test";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $field1=$field2="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $field1 = test_input($_POST['x']);
   $field2=test_input($_POST['y']);
 }

 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
  
$query1="select * from borrow where (nameBook='$field1') And (studentEmail='$field2')";

$result1 = $conn->query($query1);
if ($result1->num_rows > 0) {

    $query = "DELETE FROM `borrow` where nameBook='$field1' and studentEmail='$field2'";
    $result = mysqli_query($conn, $query) or die("Invalid query");
    echo"<script>alert('return successfully')</script>";
header('Location:studentPage.html');
    exit();
}
    mysqli_close($conn);
  ?>
      <style>
         p{
font-size:30px;
margin-lef:10px;


         }
label{
   color:white;
 font-size: 20px;
 

}
input{

   background-color: wheat;
     border-radius: 5px;
     padding: 5px;

     border-color:black;


}
button{
   border-radius: 5px;
              padding: 10px;
              font-weight:  bold;
              background-color: wheat;
              border-color:black;
}
body{background-image:url(Browse.jpeg);
   min-height: 600px;
  background-position: center;
  background-repeat: no-repeat;
  background-size:  cover;
  position: relative;
}
ul {
  list-style-type: none;
  margin-top: 10px;
  padding: 0;
  overflow: hidden;
  border-radius: 10px;
  border: black;

}

li {
  float: left;
  border: black;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 25px;
}

li a:hover:not(.active) {
  border-bottom: 3px solid white;

  background-color:#f1eb90;
}

li a.active {
  border-bottom: 3px solid white;

  color: white;
  background-color:#f1eb90;
}
      </style>
    <p><img src="logo.png" title="logo">
    <ul>

      <li><a class="active" href="studentPage.html">Home</a></li>
      <li><a onclick="load()">About Us</a></li>
      <li><a href="update student.html" >Updating Details</a></li>
       <li><a href="Browse.php">Browsing</a></li>
       <li><a href="filter.html">fiter</a></li>

       <li><a href="borrow.html">Borrow</a></li>
       <li><a href="return.php">return</a></li>
       <li><a href="extend.html">extendperiod</a></li>

      <li><a href="homepage.html">Log Out</a>  </li>  
  

    </ul>
    <center>
         <form  method="POST"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
             <label >Name of Book</label>
             <br>
             
             <input type="text" name="x"> 
  <br>
  <label >Your Email</label>
             <br>
            
             <input type="email" name="y"> 
  <br>  
  
  <br>
              <button type="submit"  >Return</button>
        
           </form>
</center>
</body>
</html>
