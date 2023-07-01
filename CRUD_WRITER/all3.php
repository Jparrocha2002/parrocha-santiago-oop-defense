<?php
include "../Tables/writers.php";

header('Content-type: application/json; charset=UTF-8');

$readAll = new Writers();

$readAll->setup();

echo $readAll->fetchAll($_POST);

?>
