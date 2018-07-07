<?php
    //Header

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:
            Access-Control-Allow-Headers,
            Access-Control-Allow-Origin,
            Content-Type,
            Authorization, X-Requested-with');

    include_once '../../config/Database.php';
    include_once '../../models/Task.php';

    //Instantiate DB & Connect

    $database = new Database();
    $db = $database->connect();

    //Instantiate task object

    $task = new Task($db);

    //Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $task->title = $data->title;
    $task->description = $data->description;
    $task->deadline = $data->deadline;

    //Create task
    if($task->create())
    {
        echo json_encode(
            array('message' => 'Task created')
        );
    }
    else
    {
        echo json_encode(
            array('message' => 'Task not created')
        );
    }
?>
