

<?php
  // This is the file taht will connect to database and we can use this file in anaother file in order to connect and use database
  
  $conn = mysqli_connect("localhost", "root","","php_project")
          or die("could not connect to database");

?>