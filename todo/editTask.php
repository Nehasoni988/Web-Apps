<?php
 include "todoconnection.php";
  

   $oldTitle = trim($_POST['oldTitle']);
   $newTitle = trim($_POST['newTitle']);
   $newDiscription =$_POST['newTask'];
   $newDate = $_POST['newDate'];

   $newDate = date($newDate);
 
  $sql = "UPDATE todoTable SET title='".$newTitle."',discription='".$newDiscription."',deadline='".$newDate."' WHERE title ='".trim($oldTitle)."' ";
   
   if(mysqli_query($conn,$sql))
   {
      echo "";
   }
   else
   {
      echo "Can't change";
   }



?>
