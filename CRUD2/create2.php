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

$novel = new Novel();
$novel->setup();

if(!empty($_POST['title']))
{
    $novel->insert($_POST['title'],$_POST['status'],$_POST['release_date']);
}

if($novel){
    $response = [
        "code" => 201,
        "message" => "Novel added successfully"
    ];
} else {
    $response = [
        "code" => 403,
        "message" => "Novel added unsuccessfully"
    ];
}

echo json_encode($response);
?>