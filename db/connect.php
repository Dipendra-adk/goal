<?php
   $host = "localhost";
   $username = "root";
   $password = "";
   $dbname = "goal";

   $con = mysqli_connect($host,$username,$password,$dbname);
   $conn = mysqli_connect($host,$username,$password,$dbname);
  
  if(!$con){
  if(!$conn){  
      die("connection failed");
  }
}
?>