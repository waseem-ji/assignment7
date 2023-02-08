<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Method:GET');
header('Access-Control-Allow-Header:Content-Type,Access-Control-Allow-Header,Authorization,X-request-With');

include('function.php');
$request_method = $_SERVER["REQUEST_METHOD"];
if ($request_method == "GET") {
    if (isset($_GET['id']))
    {
        echo $_GET['id'];
        $single_task = markTaskAsCompleted($_GET);
        echo $single_task;
    }
    else {
        $all_tasks = getTasks($_GET['user_id']);
        echo $all_tasks;
        return $all_tasks;
    }
    
}
else {
    $data = [
        'status' => 405,
        'message' => $request_method . " Request Method not allowed",

    ];
    header("HTTP/1.0 405 Method not allowed");
    echo json_encode($data);
}

?>