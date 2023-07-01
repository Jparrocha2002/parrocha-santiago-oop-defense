<?php
include "../Tables/novels.php";

header('Content-type: application/json; charset=UTF-8');

$delete = new Novels();

$delete->setup();

echo $delete->delete($_GET);


?>