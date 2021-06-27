<?php 

$create_product = array("type" => "create", "index" => "products");

if ($type == "overview") {
?>

<div id="product_container">
    <a href="index.php?<?php echo http_build_query($create_product); ?>"><div id="create_product"><p><i class="far fa-plus-square"></i> klik hier om een product aan te maken</p></div></a>

    <?php 
    
    $UID = $_SESSION['UID'];
    $sqlProducts = "SELECT * FROM products WHERE UID=$UID";
    $productsOverview = mysqli_query($db, $sqlP);

    while ($record = mysqli_fetch_assoc($pending)) {
    
        $product_name = $record['name'];
        $product_description = $record['description'];
        $product_type = $record['product_type'];
        $img = 'product_image/'.$record['img'];
        $price_total = $record['price_whole'] . "," . $record['price_decimal'];
        $times_sold = $record['times_sold'];
    ?>

        <div class="product_item">
            <div class="image">
                <img src=<?php echo $img ?>>
            </div>
        </div>

    <?php 
    }
    ?>
</div>

<?php
}
if ($type == "create") {
?>

<div id="create_container">
<?php include('error.php');?>
    <form action="index.php?<?php echo http_build_query($create_product); ?>" method="POST" id="form_create" enctype='multipart/form-data'>
        <div class="product_create">
            <div><input type="text" placeholder="product name" name="product_name"></input></div>
            <div id="product_price">
                <br>
                prijs: <br>
                € <input name="price1"></input> , <input name="price2"></input>
            </div>
            <div id="product_type">
                <select name="product_type">
                    <option value="">selecteer product type</option>
                    <option value="mask">mondkapje</option>
                    <option value="stickers">stickers</option>
                    <option value="phone_case">telefoon hoes</option>
                    <option value="poster">poster</option>
                    <option value="accessoires">accessoires</option>
                </select>
            </div>
            <textarea rows="5" cols="20" name="product_description" placeholder="product description"></textarea>
            <div id="image">
                <p>selecteer afbeelding</p>
                <input type="file" name="image">
            </div>
            <button type="submit" name="create_product" class="button"><p><i class="far fa-plus-square"></i> PRODUCT AANMAKEN</p></button>
        </div>
    </form>
</div>

<?php
}
?>

