<?php

     $servername = "localhost";
     $username = "root";
     $password = "root";
     $database = "todo";
 
$conn = mysqli_connect($servername, $username, $password,$database); //create connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
else
{
echo "";
}


?>