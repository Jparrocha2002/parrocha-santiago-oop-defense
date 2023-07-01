<?php
include "../Tables/writers.php";

header('Content-type: application/json; charset=UTF-8');

$delete = new Writers();

$delete->setup();

echo $delete->delete($_GET);


?>