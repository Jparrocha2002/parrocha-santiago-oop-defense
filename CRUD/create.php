<?php
include "../writer.php";

header('Content-type: application/json; charset=UTF-8');

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo json_encode([
        "code" => 201,
        "message" => $_SERVER['REQUEST_METHOD']. " Method is not allowed, Only POST Method is allowed",
    ]);

    exit();
}

$create = new Writer();
$create->setup();

if(!empty($_POST['first_name']))
{
    $create->insert($_POST['first_name'], $_POST['last_name'], $_POST['gender']);
}

if($create){
    $response = [
        "code" => 200,
        "message" => "Writer added successfully"
    ];
} else {
    $response = [
        "code" => 404,
        "message" => "Writer added unsuccessfully"
    ];
}

echo json_encode($response)
?>