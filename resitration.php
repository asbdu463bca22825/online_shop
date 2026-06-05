<?php

class Registration
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function register(
        $name,
        $email,
        $password,
        $confirm_password,
        $phonenum,
        $role
    ) {
        try {

            
            if (
                empty($name) ||
                empty($email) ||
                empty($password) ||
                empty($confirm_password) ||
                empty($phonenum)
            ) {
                throw new Exception("All fields are required");
            }

          
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format");
            }

          
            if ($password !== $confirm_password) {
                throw new Exception("Passwords do not match");
            }

          
            $check = $this->db->prepare(
                "SELECT id FROM register WHERE email = ?"
            );

            if (!$check) {
                throw new Exception("Prepare Failed: " . $this->db->error);
            }

            $check->bind_param("s", $email);
            $check->execute();
            $result = $check->get_result();

            if ($result->num_rows > 0) {
                throw new Exception("Email already exists");
            }

            
            $hashed_password = password_hash(
                $password,
                PASSWORD_BCRYPT
            );

            $sql = "INSERT INTO register
                    (name,email,password,phonenum,role)
                    VALUES (?,?,?,?,?)";

            $stmt = $this->db->prepare($sql);

            if (!$stmt) {
                throw new Exception("SQL Error: " . $this->db->error);
            }

            $stmt->bind_param(
                "sssss",
                $name,
                $email,
                $hashed_password,
                $phonenum,
                $role
            );

            if (!$stmt->execute()) {
                throw new Exception(
                    "Registration Failed: " . $stmt->error
                );
            }

            return true;

        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>
