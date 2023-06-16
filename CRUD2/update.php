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

$update = new Novel();

$update->setup();

if(!empty($_POST['id']))
{
    $update->update($_POST['id'], $_POST['title'], $_POST['status'], $_POST['release_date']);
}

// $title = $_POST['title'];
// $status = $_POST['status'];
// $release_date = $_POST['release_date'];

// if(!empty($_POST['id']))
// {
//     $update->update($_POST['id'], $title, $status, $release_date);
// }

// if(!empty($raw))
// {
//     $raw = [
//         "title" => $_POST['title'],
//         "status" => $_POST['status'],
//         "release_date" => $_POST['release_date'],
//     ];

//     foreach($raw as $columns => $new_data)
//     {
//         if(!empty($_POST['id']))
//         {
//                 $update->update($_POST['id'], $columns, $new_data);
//         }
//     }
// }

if($update){
    $response = [
        "code" => 201,
        "message" => "Novel updated successfully"
    ];
} else {
    $response = [
        "code" => 404,
        "message" => "Novel updated unsuccessfully"
    ];
}

echo json_encode($response);

?>