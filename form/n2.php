<?php
session_start();
include "connection.php";
$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
?>

<!DOCTYPE html>
<html>
<head>
   <title>data</title>
   <link rel="stylesheet" type="text/css" href="regform.css">
   <style>
    
   </style>
</head>
<body style="background-color:#f6eec0 ">
<div class="detail"><strong>WELCOME !! YOUR DETAILS ARE HERE</strong></div>
<div class="loginform">
       <?php
         
         echo "<br>";  

         if( $_SERVER['REQUEST_METHOD'] == "POST" )
        {

            $userid = $_POST['userid'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM table1 WHERE UserId='$userid'";
            $result = mysqli_query($conn,$sql);
            $NoOfRow = mysqli_num_rows($result);
  
            if($NoOfRow == 1)
            {
                  $_SESSION['err1'] = "";
                  while($row = mysqli_fetch_assoc($result))
                 {
                   $pass = $row["Password"];
                   if($password == $pass)
                   {
                     $_SESSION['err2'] = "";
                     
                     echo "<li><b>Name    </b>     : ".$row["Name"].    "</li>";
                     echo "<li><b>Address </b>     : ".$row["Address"]. "</li>";
                     echo "<li><b>Gender  </b>     : ".$row["Gender"].  "</li>";
                     echo "<li><b>Country </b>     : ".$row["Country"]. "</li>";
                     echo "<li><b>District</b>     : ".$row["District"]."</li>";
                     echo "<li><b>ZipCode </b>     : ".$row["ZipCode"]. "</li>";
                     echo "<li><b>Email   </b>     : ".$row["Email"].   "</li>";
                     echo "<li><b>Category</b>     : ".$row["Category"]."</li>";
                     echo "<li><b>About   </b>     : ".$row["about"].   "</li>";
                                        
                   }
                   else
                   {
                       $_SESSION['err2'] = "*password is wrong";
                       header('location:loginform.php');
                       
                   }
         
            } 
   }
   else
   {
      $_SESSION['err1'] = "*UserId is not exist";
      header('location:loginform.php');
   }

}
mysqli_close($conn);
?>
    </div>
    <button id="b1"><a href="loginform.php">Back</a></button>
    <button id="b2"><a href="home.php">Home</a></button>
</body>

</html>

