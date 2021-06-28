<?php

$sqlGet = "SELECT * FROM products ORDER BY PID ASC LIMIT 20";
$newProducts = mysqli_query($db, $sqlGet);

?>

<p class="items-context">nieuwe merch</p>
<div class="item-container">
    <?php 
    
    while ($record = mysqli_fetch_assoc($newProducts)) {

        $product_name = $record['name'];
        $product_description = $record['description'];
        $product_type = $record['product_type'];
        $img = 'productImage/'.$record['img'];
        $price_total = strval("€ " . $record['price_whole'] . "," . $record['price_decimal']);
        $times_sold = $record['times_sold'];
        $product_ID = $record['PID'];

        $http_PID = array("type" => $product_ID, "index" => "PID");
    
    ?>

    <a class="item_href" href="index.php?<?php echo http_build_query($http_PID); ?>">
    <div class="item">
        <div class="image">
            <img src="<?php echo $img ?>" alt="product image">
        </div>
        <p class="name"><?php echo $product_name ?></p>
        <p class="price"><?php echo $price_total ?></p>
    </div>
    </a>

    <?php 
    }
    ?>
</div>
<p class="items-context">best verkocht</p>
<div class="item-container">
    <div class="item"></div>
</div>