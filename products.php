<?php 

$create_product = array("type" => "create", "index" => "products");

?>

<div id="product_container">
    <a href="index.php?<?php echo http_build_query($products); ?>"><div id="create_product"><p><i class="far fa-plus-square"></i> klik hier om een product aan te maken</p></div></a>
</div>