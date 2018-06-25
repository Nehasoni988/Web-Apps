<?php

     $servername = "localhost";
     $username = "root";
     $password = "root";
     $database = "form_data";
 
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