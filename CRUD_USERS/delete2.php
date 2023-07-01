<?php
include "../Tables/users.php";

header('Content-type: application/json; charset=UTF-8');

$delete = new Users();

$delete->setup();

echo $delete->delete($_GET);


?>