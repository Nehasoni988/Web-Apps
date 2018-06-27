<?php
include "todoconnection.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{ 
                $sql = "SELECT * from todoTable";
                $result = mysqli_query($conn,$sql);
                echo "<tr><th>S.NO.</th><th>TITLE</th><th>DESCRIPTION</th><th>DEADLINE</th><th colspan=2>OPTION</th></tr>";
                $x = 1;
                if(mysqli_num_rows($result) > 0)
                {
                   while($row = mysqli_fetch_assoc($result))
                  {
                    
                    echo "<tr><td>".$x++.".</td><td>".$row['title']."</td><td>".$row['discription']."</td><td>".$row['deadline']."</td><td colspan=2><input onclick='deleteTask( ($(this).parent()).parent().html() )' class='remove' type='submit' value='REMOVE'><input type='submit' class='remove1' value='SHOW' onclick='showme( ($(this).parent()).parent().html() )'><input type='submit' onclick='showme1( ($(this).parent()).parent().html() )' class='remove2' value='EDIT'></td></tr></td></tr>";
                  }  
                                
                }
                else
                {
                     echo "<tr><td colspan=6>NO DATA IS AVALIABLE</td></tr>";

                }
 }
 else
 {
     echo "method is not post";
 }               
             
?>