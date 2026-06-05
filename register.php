<?php

include "database.php";
include "registration.php";

try {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $db = new Database();
        $userReg = new Registration($db);

        $userReg->register(
            trim($_POST['name'] ?? ''),
            trim($_POST['email'] ?? ''),
            $_POST['password'] ?? '',
            $_POST['confirmpassword'] ?? '',
            trim($_POST['phonenum'] ?? ''),
            $_POST['role'] ?? 'USER'
        );

       
        header("Location: login.php");
        exit();
    }

} catch (Exception $e) {

    echo "Registration Failed: " . $e->getMessage();

}
?>
