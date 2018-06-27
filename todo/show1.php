<?php

include 'todoconnection.php';

$title = $_POST['title'];

$sql = "SELECT * from todoTable where title='$title' ";
$result = mysqli_query($conn,$sql);

if($result)
{
	   while($row = mysqli_fetch_assoc($result))
	   {
	 	echo "<div class='show1'>TITLE</div>";
	 	echo '<input type="text" class="s11" id = "s1" value=" '.$row['title']. ' "> ';
	 	
	 	echo "<div class='show1'>DESCRIPTION</div>";
	 	echo '<input type="text" class="s11" id = "s2" value=" '.$row['discription']. ' "> ';

	 	echo "<div class='show1'>DEADLINE</div>";
	 	echo '<input type="text" class="s11" id = "s3" value=" '.$row['deadline']. ' "> ';

	 	echo "<button class='cross'>X</button><br>";
	 	echo "<br><button class='save' id='save'>SAVE</button>";
	 }
}
else
{
	echo "no such type of title";
}

?>