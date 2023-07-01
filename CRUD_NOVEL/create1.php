<?php
include "../Tables/novels.php";

header('Content-type: application/json; charset=UTF-8');

$create = new Novels();

$create->setup();

echo $create->create($_POST);

?>