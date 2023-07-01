<?php
include "../Tables/users.php";

header('Content-type: application/json; charset=UTF-8');

$update = new Users();

$update->setup();

echo $update->update($_POST);


?>