<?php

include "../writer.php";

header('Content-type: application/json; charset=UTF-8');

if($_SERVER['REQUEST_METHOD'] != 'GET'){
    echo json_encode([
        "code" => 201,
        "message" => $_SERVER['REQUEST_METHOD']. " Method is not allowed, Only GET Method is allowed",
    ]);

    exit();
}

$readAll = new Writer();

$readAll->setup();

if($readAll){
    $response = [
        "code" => 200,
        "message" => "Writer list fetched successfully"
    ];
} else {
    $response = [
        "code" => 404,
        "message" => "Writer list fetched unsuccessfully"
    ];
}
echo json_encode($response);

echo $readAll->fetchAll();



?>
