<?php
abstract class Database
{
    abstract function initialize();
}

interface Table
{
    public function createTbl();
}


?>