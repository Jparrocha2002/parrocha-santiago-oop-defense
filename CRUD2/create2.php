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

$create = new Novel();
$create->setup();

if(!empty($_POST['title']))
{
    $create->insert($_POST['title'], $_POST['status'], $_POST['release_date']);
}

if($create){
    $response = [
        "code" => 201,
        "message" => "Novel added successfully"
    ];
} else {
    $response = [
        "code" => 404,
        "message" => "Novel added unsuccessfully"
    ];
}

echo json_encode($response);
?>