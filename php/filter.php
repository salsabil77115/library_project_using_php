
          <?php
          $mysqli = mysqli_connect("localhost", 'salsabil', '8PihA2scEmJqJEIR', 'test');
          if (!$mysqli) {
              die("Connection failed: " . mysqli_connect_error());
            }
          
          
            $field1=$field2=$field3=$field4=$field5="";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
                $field5 = test_input($_POST['num_of_copies']);
            }
             
            

              
              if(isset($field5)){
                 $query = "select * from book where num_of_copies='$field5'";
                 $result = mysqli_query($mysqli, $query) or die("Invalid query");
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
               
               
               }
               echo "</table>";
               
               }
               else {
               echo "<p>0 results</p>";
               }
               
     
              }
       
                 


           
          
           function test_input($data) {
             $data = trim($data);
             $data = stripslashes($data);
             $data = htmlspecialchars($data);
             return $data;
           }
          
          
                   
       
mysqli_close($mysqli);

?>   