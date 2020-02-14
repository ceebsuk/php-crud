<?php

class Database 
{
    // Defining configuration variables - would be better in a configuration file using define().
    private $connection;
    private $host       = "localhost";
    private $name       = "php_cms";
    private $username   = "root";
    private $password   = "";
    private $options    = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
    ];
    
    // Make the connection on object instantiation.
    function __construct() 
    {
        try 
        {
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name, $this->username, $this->password, $this->options);
        } 
        catch(PDOException $e)
        {
            http_response_code(500);
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Return the PDO object.
    public function getConnection() 
    {
        try 
        {
            return $this->connection;
        } 
        catch(PDOException $e)
        {
            http_response_code(500);
            die("Database connection failed: " . $e->getMessage());
        }
    }
}