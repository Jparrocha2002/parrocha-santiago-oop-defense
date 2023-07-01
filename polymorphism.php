<?php
abstract class Database
{
    abstract function initialize();
}

interface Functions
{
    public function createTable();
    public function create($params);
    public function getRecord($params);
    public function fetchAll();
    public function delete($params);
    public function update($params);
}


?>