<?php

include 'todoconnection.php';

$title = $_POST['title'];

$sql = "SELECT * from todoTable where title='$title' ";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
	 while($row = mysqli_fetch_assoc($result))
	 {
	 	echo "<div class='show1'>TITLE</div>".$row['title'];
	 	echo "<div class='show1'>DESCRIPTION</div>".$row['discription'];
	 	echo "<div class='show1'>DEADLINE</div>".$row['deadline'];
	 	echo "<button class='cross'>X</button>";
	 }
}
else
{
	echo "no such type of title";
}

?>