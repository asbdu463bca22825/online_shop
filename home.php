<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
 $file = __DIR__ . "/product.php";

if (!file_exists($file)) {
    die("Product.php file not found: " . $file);
}

require_once $file;

try {

    $productObj = new Product();
    $products = $productObj->getProducts();

} catch (Exception $e) {

    echo "Error: " . $e->getMessage();

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Shop</title>
<link rel="stylesheet" href="css/home_page.css">
</head>

<body>

<div class="header">
    <h1>Online Shop</h1>
   
        <a href="cart.php" style="color:white;text-decoration:none;margin-right:-1100px;">
            🛒 Cart
        </a>

        <a href="logout.php" style="color:white;text-decoration:none;">
            Logout
        </a>
    
</div>

<div class="container">

<?php foreach($products as $p) { ?>

<div class="card">
    <img src="<?php echo $p['img']; ?>" width="200" alt=" ">
    <h3><?php echo $p['name']; ?></h3>
    <p>₹<?php echo $p['price']; ?></p>

    <a href="buynow.php?id=<?php echo $p['id']; ?>" class="btn btn-buy">
    Buy Now
</a>

<a href="add_cart.php?id=<?php echo $p['id']; ?>" class="btn btn-cart">
    Add to Cart
</a>
</div>

<?php } ?>

</div>

</body>
</html>
