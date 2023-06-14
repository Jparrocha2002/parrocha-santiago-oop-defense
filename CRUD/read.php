<?php
include "../writer.php";

header('Content-type: application/json; charset=UTF-8');

$writer = new Writer();

$writer->setup();

echo $writer->fetchWriter($_GET);
