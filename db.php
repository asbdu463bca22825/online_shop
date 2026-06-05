<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "novalnet";
    private $dbname = "online_shop";

    private $conn;

    public function connect()
    {
        try {

            $this->conn = new mysqli(
                $this->host,
                $this->username,
                $this->password,
                $this->dbname
            );

            if ($this->conn->connect_error) {
                throw new Exception(
                    "Connection Failed: " . $this->conn->connect_error
                );
            }

            return $this->conn;

        } catch (Exception $e) {

            die($e->getMessage());

        }
    }
}
?>
