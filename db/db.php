<?php

class DBConnection
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=localhost:3307;dbname=dashboard",
            "root",
            ""
        );
    }

    public function getDBConnection()
    {
        return $this->db;
    }

    public function __destruct()
    {
        $this->db = null;
    }
}

?>