<?php
include "../Tables/writers.php";

header('Content-type: application/json; charset=UTF-8');

$update = new Writers();

$update->setup();

echo $update->update($_POST);


?>