<?php
include "../Tables/novels.php";

header('Content-type: application/json; charset=UTF-8');

$readAll = new Novels();

$readAll->setup();

echo $readAll->fetchAll($_POST);



?>
