<?php
include "../Tables/writers.php";

header('Content-type: application/json; charset=UTF-8');

$create = new Writers();

$create->setup();

echo $create->create($_POST);
?>