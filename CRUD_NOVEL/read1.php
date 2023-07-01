<?php
include "../Tables/novels.php";

header('Content-type: application/json; charset=UTF-8');

$read = new Novels();

$read->setup();

echo $read->getRecord($_GET);

?>