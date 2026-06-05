<?php
session_start();
require_once "product.php";

$productObj = new Product();
$products = $productObj->getProducts(); 

$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="card_action.css">
</head>
<body>

<h1>Your Cart 🛒</h1>

<?php if (empty($_SESSION['cart'])): ?>
    <p>Your cart is empty.</p>
    <a href="home.php">Continue Shopping</a>

<?php else: ?>

<table border="1" cellpadding="10">
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>

    <?php foreach ($_SESSION['cart'] as $id => $qty): ?>

        <?php if (!isset($products[$id])) continue; ?>

        <?php
            $subtotal = $products[$id]['price'] * $qty;
            $total += $subtotal;
        ?>

        <tr>
            <td><?php echo htmlspecialchars($products[$id]['name']); ?></td>
            <td><?php echo (int)$qty; ?></td>
            <td>₹<?php echo number_format($subtotal); ?></td>
        </tr>

    <?php endforeach; ?>

    <tr>
        <td colspan="2"><strong>Total</strong></td>
        <td><strong>₹<?php echo number_format($total); ?></strong></td>
    </tr>
</table>

<br>
<a href="home.php">Continue Shopping</a>

<?php endif; ?>

</body>
</html>
