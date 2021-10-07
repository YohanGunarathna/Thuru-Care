<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "fyp";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

if(isset($_POST['submit'])) {
  $name=$_POST['name'];
  $password=$_POST['password'];


  $query = "INSERT INTO login (Name,  Password)
  VALUES ('$name', '$password')";

if (!mysqli_query ($dbconnect, $query)) {
        die ('Error: ' . mysqli_error($dbconnect));
    } 
    else {
        
    }
    mysqli_close ($dbconnect);
    echo "<META http-equiv=\"refresh\" content=\"0;URL=home.html\">";

}
?>