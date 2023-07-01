<?php
include "../Tables/writers.php";

header('Content-type: application/json; charset=UTF-8');

$search = new Writers();

$search->setup();

echo $search->search($_POST);
?>