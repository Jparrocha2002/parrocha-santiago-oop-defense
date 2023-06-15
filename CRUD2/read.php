<?php
include "../novel.php";

header('Content-type: application/json; charset=UTF-8');

$read = new Novel();

$read->setup();

echo $read->getNovelRecord($_GET);
?>