<?php
include "../Tables/novels.php";

header('Content-type: application/json; charset=UTF-8');

$update = new Novels();

$update->setup();

echo $update->update($_POST);


?>