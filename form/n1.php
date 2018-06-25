<?php
session_start();
$_SESSION['error'] = "";
include "connection.php";

if($_SERVER['REQUEST_METHOD']=="POST")
{       

        $name =$_POST['username'];
        $address =  $_POST['address'];
        $gender =  $_POST['gender'];
        $country =  $_POST['country'];
        $district =  $_POST['district'];
        $zc =  $_POST['zc'];
        $userid =  $_POST['userid'];
        $password =  $_POST['password'];
        $email =  $_POST['email'];
        $cat =  $_POST['cat'];
        $text =  $_POST['text'];


        $sql1 = "SELECT * from table1 WHERE UserId = '$userid'";
        $result1 = mysqli_query($conn,$sql1);
        $noOfRow = mysqli_num_rows($result1);
        if( $noOfRow > 0)
        {
           $_SESSION['error'] = "Username Is already Taken";
           header('location:regform.php');
        }
        else
        {
           $_SESSION['error'] = "";
           $sql = "INSERT INTO table1(Name,Address,Gender,Country,District,ZipCode,Userid,Password,Email,Category,about) VALUES ('$name','$address','$gender','$country','$district','$zc','$userid','$password','$email','$cat','$text' )";

           if (mysqli_query($conn, $sql)) 
          {
            echo "New records created successfully";
          } 
          else 
          {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        }
}
else
{
        print "check your method";
}

mysqli_close($conn);
?>
       
