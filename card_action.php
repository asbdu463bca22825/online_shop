<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="css/card_action.css">
    
</head>

<body>

<div class="header">
    <h2>🛒 Products</h2>
    <div>Welcome, <?php echo $_SESSION['user']; ?></div>
</div>

<div class="container">

<div class="grid">

<?php
$products = [
            ["id"=>1,"name"=>"Mobile","price"=>15000,"img"=>"images/mobile.jpeg"],
            ["id"=>2,"name"=>"Laptop","price"=>55000,"img"=>"images/laptop.jpeg"],
            ["id"=>3,"name"=>"Watch","price"=>5000,"img"=>"images/watch.jpeg"]
    ];
foreach($products as $p){
?>

    <div class="card">
        <img src="images/<?php echo $p['img']; ?>">
        <h3><?php echo $p['name']; ?></h3>
        <p><b><?php echo $p['price']; ?></b></p>

        <a class="btn buy" href="buynow.php?id=<?php echo $p['id']; ?>">Buy Now</a>
        <a class="btn cart" href="add_card.php?id=<?php echo $p['id']; ?>">Add to Cart</a>
    </div>

<?php } ?>
</div>
</div>


</body>
</html>
