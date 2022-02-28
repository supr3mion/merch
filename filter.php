<?php
if ($type == "successful_login") {
?>

<div id="filter_server">
    <p>u bent succesvol ingelogd</p>
</div>

<?php
}
if ($type == "successful_logout") {
?>

<div id="filter_server">
    <p>u bent succesvol uitgelogd</p>
</div>

<?php
}
if ($type == "successful_account") {
?>
    
<div id="filter_server">
    <p>account registratie succesvol<br>klik <a href="index.php?<?php echo http_build_query($login); //deze array is vindbaar in [header.php] ?>">hier</a> om in te loggen</p>
</div>
    
<?php
}
if ($type == "successful_request") {
?>
        
<div id="filter_server">
    <p>u bent succesvol uitgelogd</p>
</div>
        
<?php
}

if ($type == ("kleren" || "maskers" || "stickers" || "telefoon_hoezen" || "posters" || "accessoires")) {

    $product_type = $type;

    if ($type == "telefoon_hoezen") {
        $product_type = "phone case";
    }
    if ($type == "maskers") {
        $product_type = "mask";
    }
    if ($type == "stickers") {
        $product_type = "stickers";
    }
    if ($type == "posters") {
        $product_type = "poster";
    }

    $sqlGet = "SELECT * FROM products WHERE product_type='$product_type'";
    $product = mysqli_query($db, $sqlGet);

    ?>
    
    <div id="filter_products">

    <?php

    while ($record = mysqli_fetch_assoc($product)) {

    $product_name = $record['name'];
    $img = 'productImage/'.$record['img'];
    $price_total = strval("€ " . $record['price_whole'] . "," . $record['price_decimal']);
    $product_ID = $record['PID'];
    
    $data = array("UID" => $UID, "PID" => $product_ID);

    ?>

    <div class="item_restrain">
    <a class="item_href" href="index.php?<?php echo http_build_query($data); ?>">
        <div class="item_filter">
            <div class="image_filter">
                <img src="<?php echo $img ?>" alt="product image">
            </div>
            <p class="name"><?php echo $product_name ?></p>
            <p class="price"><?php echo $price_total ?></p>
        </div>
    </a>
    </div>

    <?php
    }

    ?> 
    
    </div>
    
    <?php
}
?>