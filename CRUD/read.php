<?php
include "../writer.php";

header('Content-type: application/json; charset=UTF-8');

$read = new Writer();

$read->setup();

echo $read->getWriterRecord($_GET);
?>