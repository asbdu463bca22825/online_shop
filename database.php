<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "novalnet";
    private $dbname = "online_shop";
    private $conn;

    public function __construct()
    {
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            $this->conn = new mysqli(
                $this->host,
                $this->user,
                $this->pass
            );

            $this->conn->set_charset("utf8mb4");

            $this->createDatabase();
            $this->createTable();

        } catch (Exception $e) {
            die("Database Connection Error: " . $e->getMessage());
        }
    }

    private function createDatabase()
    {
        try {
            $sql = "CREATE DATABASE IF NOT EXISTS {$this->dbname}";
            $this->conn->query($sql);

            $this->conn->select_db($this->dbname);

        } catch (Exception $e) {
            throw new Exception("Database Creation Failed: " . $e->getMessage());
        }
    }

    private function createTable()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS register (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(150) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                phonenum VARCHAR(15) NOT NULL,
                role ENUM('USER','ADMIN') DEFAULT 'USER'
                
            )";

            $this->conn->query($sql);

        } catch (Exception $e) {
            throw new Exception("Table Creation Failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>



