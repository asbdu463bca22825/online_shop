<?php
session_start();

class Product
{
    private $products = [
            ["id"=>1,"name"=>"Mobile","price"=>15000,"img"=>"images/mobile.jpeg"],
            ["id"=>2,"name"=>"Laptop","price"=>55000,"img"=>"images/laptop.jpeg"],
            ["id"=>3,"name"=>"Watch","price"=>5000,"img"=>"images/watch.jpeg"]
    ];
  

    public function getProduct($id)
    {
        return $this->products[$id] ?? false;
    }
}

$productObj = new Product();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = $productObj->getProduct($id);

if (!$product) {
    die("Product not found!");
}

$qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;

if ($qty < 1) {
    $qty = 1;
}

$total = $product['price'] * $qty;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buy Now</title>
    <link rel="stylesheet" href="css/card_style.css">
</head>
<body>

<div class="container">

    <img src="<?= $product['img']; ?>"
         alt="<?= htmlspecialchars($product['name']); ?>"
         width="250">

    <h2><?= htmlspecialchars($product['name']); ?></h2>

    <p class="price">
        ₹<?= number_format($product['price']); ?>
    </p>

   
    <form method="post">
        <label>Quantity:</label><br><br>

        <input type="number"
               name="qty"
               value="<?= $qty; ?>"
               min="1">

        <br><br>

    </form>

    <p>
        <strong>Total: ₹<?= number_format($total); ?></strong>
    </p>

   
    <form  method="get">

        <input type="hidden"
               name="id"
               value="<?= $product['id']; ?>">

        <input type="hidden"
               name="qty"
               value="<?= $qty; ?>">

        <input type="hidden"
               name="total"
               value="<?= $total; ?>">

       </form>

    <br>
   <a href="placeorder.php" class="btn">
     
            Place Order</a>
       
    <a href="home.php" class="btn back">
        Back to Shop
    </a>

</div>

</body>
</html>
