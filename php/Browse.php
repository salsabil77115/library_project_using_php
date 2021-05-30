<html>
   <head>
      <title>Search</title>
   </head>
   <body>
   <?php
$mysqli = mysqli_connect("localhost", 'salsabil', '8PihA2scEmJqJEIR', 'test');
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
  }


  $field1="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $field1 = test_input($_POST['x']);
 }

 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
  

  $query = "select * from book where title='$field1'";
  $result = mysqli_query($mysqli, $query) or die("Invalid query");

        



  ?>
      <style>
         p{
font-size:30px;
margin-lef:10px;


         }
label{
   color:black;
 font-size: 20px;
 margin-left: 60px;
 margin-top: 60px;

}
input{

   background-color: wheat;
     border-radius: 5px;
     padding: 5px;
     margin-left: 20px;
     margin-top: 60px;


}
button{
   border-radius: 5px;
              padding: 10px;
              font-weight:  bold;
              background-color: wheat;
              margin-left: 150px;
}
body{background-image:url(Browse.jpeg);
   min-height: 600px;
  background-position: center;
  background-repeat: no-repeat;
  background-size:  cover;
  position: relative;
}
table{margin-left:70px;
    margin-top:100px;
    color: black;
font-size:20px;}

      </style>
    <p><img src="logo.png" title="logo">
 
    </p>
         <form  method="POST"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
             <label >Title</label>
             
             <input type="text" name="x"> 
  <br>
            
  <br>
  <br>
              <button type="submit"  >Search</button>
        
           </form>
           <?php
          
              
              $num = mysqli_num_rows($result);

      if ($result->num_rows > 0) {
for($i=0;  $i<$num;  $i++) {
    echo "<table border='1'><tr><th>title</th><th>ISBN</th>
               <th>author</th><th>num_of_copies</th><th>publisher_year</th></tr>";
       $row = mysqli_fetch_row($result);
       echo "<tr><td>" . $row[0] . "</td><td>" . $row[1];
       echo "</td><td>" . $row[2] . "</td>";
       echo "<td>" . $row[3] . "</td>";
       echo "<td>" . $row[4] . "</td></tr>";
       echo "<img src='$row[5]' style='margin-left:60px ;width:200px;  height:200px;'>";


  }
echo "</table>";

}
else {
   echo "<p>0 results</p>";
 }

mysqli_close($mysqli);

?>   
</body>
</html>






