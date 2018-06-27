<?php
include "todoconnection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>TodoList</title>
	<link rel="stylesheet" type="text/css" href="todo.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="todo.js"></script>
</head>
<body>

    <div class="main1">
            <div class="heading"><img src="todo1.png" id="todoimage1">TO DO LIST</div>
            <div class="search"><img src="search.png" id="todoimage">Search Task By Name</div>
                <div class="search-sub">
                    <input type="text" name="search" id="search" placeholder="Task Name " onkeyup="search()">
                </div>       
            <div class="create"><img src="create.png" id="todoimage">Create Task</div>
            <div class="create-sub">
                <form  method="POST" action="todo.php">
                    <input type="text" name="TaskName" id="text" placeholder="Enter Task's Title " required>
                    <input type="date" name="date" id= "datepicker"><br>
                    <textarea type="text" name="discription" id="text1" placeholder="Task-Description" required></textarea><br>
                    <input type="submit"  value="Create" id="create" onclick="return validate()"> 
                </form>
            </div>  
            <div class="second"><img src="alltask.png" id="todoimage">All Task</div>
            <div class="first"><img src="todaytask.png" id="todoimage">Today's Task</div>
            <div class="third"><img src="pasttask.png" id="todoimage">Previous Task</div>
            <div class="fourth"><img src="future.png" id="todoimage">Upcoming Task</div>
            <div class="final"><img src="cl.svg" id="todoimage2" title="Delete All Data"></div>
    </div>
    <div class="show"><table  id="table1"></table></div>
    <div id="showme"></div>

</body>
</html>

<!-- insertion code in php -->
<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{    
        $name = $_POST['TaskName'];
        $dis = $_POST['discription'];
        $date = $_POST['date'];
        $sql = "INSERT into todoTable(title,discription,deadline) VALUES ('$name','$dis','$date')";
        if(mysqli_query($conn,$sql))
        {
           echo "";
        }
        else
        { 
        echo "";
        }
 }       

?>