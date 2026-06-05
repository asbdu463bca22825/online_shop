<?php

session_start();
require_once "db.php";

try {

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id <= 0) {
        throw new Exception("Invalid ID");
    }

    if (!$conn) {
        throw new Exception("Database connection failed");
    }

    $stmt = $conn->prepare("DELETE FROM register WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {

        header("Location: view_table.php");
        exit();

    } else {
        throw new Exception("Delete failed");
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
