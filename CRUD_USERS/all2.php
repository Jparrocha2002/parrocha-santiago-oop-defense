<?php
include "../Tables/users.php";

header('Content-type: application/json; charset=UTF-8');

$readAll = new Users();

$readAll->setup();

echo $readAll->fetchAll($_POST);



?>
