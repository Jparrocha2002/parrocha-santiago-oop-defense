<?php
include "../Tables/novels.php";

header('Content-type: application/json; charset=UTF-8');

$search = new Novels();

$search->setup();

echo $search->search($_POST);
?>