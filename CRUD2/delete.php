<?php
include "../novel.php";

header('Content-type: application/json; charset=UTF-8');

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo json_encode([
        "code" => 201,
        "message" => $_SERVER['REQUEST_METHOD']. " Method is not allowed, Only POST Method is allowed",
    ]);

    exit();
}

$delete = new Novel();
$delete->setup();

if(!empty($_POST['id']))
{
    $delete->delete($_POST['id']);
}

if($delete){
    $response = [
        "code" => 201,
        "message" => "Novel deleted successfully"
    ];
} else {
    $response = [
        "code" => 404,
        "message" => "Novel deleted unsuccessfully"
    ];
}

echo json_encode($response);


?>