<?php

class Database
{
    private $host = "localhost";
    private $dbname = "online_shop";
    private $username = "root";
    private $password = "novalnet";

    public function connect()
    {
        try {

            $conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;

        } catch(PDOException $e) {

            die("Connection Failed : " . $e->getMessage());

        }
    }
}
?>
