<?php 
    
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Task.php';

    //Instantiate DB & Connect

    $database = new Database();
    $db = $database->connect();

    //Instantiate task object

    $task = new Task($db);

    //get id

    $task->id = isset($_GET['id']) ? $_GET['id'] : die();
    // echo $task->id;

    //Task query
    $task->read_single();

    $task_arr = array(
        'id' => $task->id,
        'title' => $task->title,
        'description' => $task->description,
        'deadline' => $task->deadline
        
    );
   print_r(json_encode($task_arr));


?>