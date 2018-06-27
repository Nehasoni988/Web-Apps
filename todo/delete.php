<?php

include "todoconnection.php";

$sql = "SELECT * from todoTable";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0)
{
	$sql1 = "DELETE FROM todoTable";

         echo "<tr>
               <th>S.NO.</th>
               <th>TITLE</th>
               <th>DISCRIPTION</th>
               <th>DEADLINE</th>
               <th colspan=2>OPTION</th>
               </tr>";
        if (mysqli_query($conn, $sql1)) 
        {
            echo "<tr><td colspan=6>DATA DELETED SUCESSFULLY</td></tr>";
        } 
        else 
       {
           echo "Error deleting record: " . mysqli_error($conn); 
       }
}
else
{
	 echo "No record avaliable";
}
mysqli_close($conn);



?>