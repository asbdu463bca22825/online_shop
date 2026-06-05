<?php
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: place_order.php");
    exit();
}

$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$country = htmlspecialchars($_POST['country']);
$pincode = htmlspecialchars($_POST['pincode']);
$payment = htmlspecialchars($_POST['payment']);


$order_id = "ORD" . rand(10000, 99999);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Success</title>
    <style>
        body{
            font-family: Arial;
            background:#f2f2f2;
        }
        .box{
            width:420px;
            margin:50px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px #ccc;
            text-align:center;
        }
        h2{
            color:green;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Order Placed Successfully 🎉</h2>

    <p><b>Order ID:</b> <?php echo $order_id; ?></p>
    <p><b>Name:</b> <?php echo $name; ?></p>
    <p><b>Phone:</b> <?php echo $phone; ?></p>
    <p><b>Address:</b> <?php echo $address . ", " . $city . ", " . $country . " - " . $pincode; ?></p>
    <p><b>Payment Method:</b> <?php echo $payment; ?></p>

    <br>

    <a href="home.php">Go Back to Home</a>
</div>

</body>
</html>
