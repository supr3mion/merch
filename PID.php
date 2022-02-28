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

$data = array("UID" => $UID, "PID" => $PID);

?>

<div id="product_display">
    <div id="product_image">
        <img src="<?php echo $img ?>" alt="product image">
    </div>
    <div id="product_information">
        <p class="title"><?php echo $product_name ?><br><br></p>
        <p class="title"><?php echo $price_total ?></p>
        <p>product type: <?php echo $product_type ?> <br><br> </p>
        <p>beschrijving:<br><?php echo $product_description ?></p>
    </div>
    <form action="server.php?<?php echo http_build_query($data); ?>" method="POST">
        <button type="submit" name="buy_product" class="button"><p>voeg toe aan winkelwagen</p></button>
    </form>
</div>