
<?php

include "todoconnection.php";

$d = date("Y-m-d");
$d1 = strtotime($d);
$result = mysqli_query($conn,"SELECT * from todoTable");

echo "<tr>
         <th>S.NO.</th>
         <th>TITLE</th>
         <th>DESCRIPTION</th>
         <th>DEADLINE</th>
         <th colspan=2>OPTION</th>
         </tr>";


if(mysqli_num_rows($result)>0)
{
	$i = 1;
	$flag = 1;
	while($row = mysqli_fetch_assoc($result))
	{
		$dead = $row['deadline'];
		$dead1 = strtotime($dead);

		if($dead1 == $d1)
		{
			echo "<tr><td>".$i++.".</td><td>".$row['title']."</td><td>".$row['discription']."</td><td>".$row['deadline']."</td><td colspan=2><input onclick='deleteTask( ($(this).parent()).parent().html() )' class='remove' type='submit' value='REMOVE'><input type='submit' class='remove1' value='SHOW' onclick='showme( ($(this).parent()).parent().html() )'><input type='submit' onclick='showme1( ($(this).parent()).parent().html() )' class='remove2' value='EDIT'></td></tr></td></tr>";
                  
			$flag++;
		}
	}
	if($flag == 1)
	{
			 echo "<tr><td colspan=6>YOU HAVE NOT MENTIONED ANY PLANS FOR TODAY</td></tr>";

	}
}
else
{
	 echo "<tr><td colspan=6>NO DATA IS AVALIABLE</td></tr>";

}




?>

