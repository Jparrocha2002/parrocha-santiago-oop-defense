<?php
include "../Tables/writers.php";

header('Content-type: application/json; charset=UTF-8');

$read = new Writers();

$read->setup();

echo $read->getRecord($_POST);

?>