<?php

include "todoconnection.php";
		$title = $_POST['title'];

		$query = "DELETE FROM todoTable WHERE title ='$title'";

		if(mysqli_query($conn,$query))
			echo "Record deleted successfully";	
		else
			echo "Cannot delete";
?>