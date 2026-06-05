<?php
session_start();

require_once "product.php";

$productObj = new Product();
$products = $productObj->getProducts();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($products[$id])) {

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty']++;
    } else {
        $_SESSION['cart'][$id] = [
            "name" => $products[$id]['name'],
            "price" => $products[$id]['price'],
            "img" => $products[$id]['img'],
            "qty" => 1
        ];
  
    }
}

header("Location: cart.php");
exit();
?>
