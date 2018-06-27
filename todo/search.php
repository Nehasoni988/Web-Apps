
<?php

include "todoconnection.php";


$title=$_POST['t'];

$sql = "SELECT * from todoTable where title LIKE  '%".$title."%'" ;
echo "<tr><th>S.NO.</th><th>TITLE</th><th>DISCRIPTION</th><th>DEADLINE</th><th colspan=2>OPTION</th></tr>";

$result = mysqli_query($conn,$sql);


 if(mysqli_num_rows($result) > 0)
{
  $i = 1;
  $flag = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<tr><td>".$i++."</td><td>".$row['title']."</td><td>".$row['discription']."</td><td>".$row['deadline']."</td><td colspan=2><input onclick='deleteTask( ($(this).parent()).parent().html() )' class='remove' type='submit' value='REMOVE'><input type='submit' class='remove1' value='SHOW' onclick='showme( ($(this).parent()).parent().html() )'><input type='button' class='remove2' value='EDIT'></td></tr></td></tr>";
              
   
  }
}
else
{
echo "<tr><td colspan=6>SEARCH RESULT NOT FOUND</td></tr>";
}




?>