<?php
abstract class Database
{
    abstract function initialize();
}

interface Functions
{
    public function createTbl();
    public function getRecord($params);
    public function fetchAll();
    public function delete($id);
}


?>