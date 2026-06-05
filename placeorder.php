<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$productId = $_GET['id'] ?? '';
$qty       = $_GET['qty'] ?? 1;
$total     = $_GET['total'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Place Order & Payment</title>
    <link rel="stylesheet" href="css/placeorder_style.css">
</head>

<body>

<div class="box">

    <h2>Place Order</h2>

    <form method="post" action="success.php">

        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <input type="hidden" name="qty" value="<?php echo $qty; ?>">
        <input type="hidden" name="total" value="<?php echo $total; ?>">

        <input type="text"
               name="name"
               placeholder="Enter Name"
               required>

        <input type="tel"
               name="phone"
               placeholder="Enter Phone Number"
               pattern="[0-9]{10}"
               required>

        <textarea name="address"
                  placeholder="Enter Address"
                  required></textarea>

        <input type="text"
               name="city"
               placeholder="Enter City"
               required>

        <input type="text"
               name="country"
               placeholder="Enter Country"
               required>

        <input type="text"
               name="pincode"
               placeholder="Enter Pincode"
               pattern="[0-9]{6}"
               required>

        <select name="payment" required>
            <option value="">Select Payment Method</option>
            <option value="COD">Cash on Delivery</option>
            <option value="UPI">UPI Payment</option>
            <option value="CARD">Debit/Credit Card</option>
        </select>

        <button type="submit"><a href="success.php" class="btn"></a>
        
            Confirm Order
        </button>

    </form>

</div>

</body>
</html>
