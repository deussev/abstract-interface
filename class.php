<?php

abstract class Database
{
    public $conn;
    public $servername = "localhost";
    public $username = "root";
    public $gitpassword = "";
    public $dbName = "niel";
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
    }
    abstract public function dbName(): string;
}

class User extends Database
{
    public function dbName(): string 
    {
        $dbName = "CREATE DATABASE IF NOT EXIST $this->dbName";
        return $this->conn->query($dbName);
    }
}

$new = new User();
$new->dbName();