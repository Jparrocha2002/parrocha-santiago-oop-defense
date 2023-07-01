<?php
include "../Tables/users.php";

header('Content-type: application/json; charset=UTF-8');

$read = new Users();

$read->setup();

echo $read->getRecord($_GET);

?>