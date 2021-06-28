<?php 

$PID = $_GET['type'];

$sqlGet = "SELECT * FROM products WHERE PID='$PID'";
$product = mysqli_query($db, $sqlGet);

$record = mysqli_fetch_assoc($product);

$product_name = $record['name'];
$product_description = $record['description'];
$product_type = $record['product_type'];
$img = 'productImage/'.$record['img'];
$price_total = strval("€ " . $record['price_whole'] . "," . $record['price_decimal']);
$times_sold = $record['times_sold'];
$product_ID = $record['PID'];

?>

<div id="product display">
    <div id="product_image">
        <img src="<?php echo $img ?>" alt="product image">
    </div>
    <div id="product_information">
        <p>naam product:<br><?php echo $product_name ?></p>
        <p>prijs product:<br><?php echo strval($price_total) ?></p>
        <p>product type:<br><?php echo $product_type ?></p>
        <p>beschrijving product:<br><?php echo $product_description ?></p>
    </div>
</div>