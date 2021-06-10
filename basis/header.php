<?php
$kleren = array("type" => "kleren");
$maskers = array("type" => "maskers");
$stickers = array("type" => "stickers");
$telefoon_hoezen = array("type" => "telefoon_hoezen");
$posters = array("type" => "posters");
$accessoires = array("type" => "accessoires");

$settings = array("index" => "settings");
$products = array("index" => "products");
$orders = array("index" => "orders");
$logout = array("index" => "logout");
?>

<div id="space">
    <div id="logo"></div>
    <div id="search"></div>
    <div id="account">
        <a class="item-type" href="index.php?<?php echo http_build_query($settings); ?>"><i class="fas fa-chevron-left"></i><?php echo "  hello there" ?></a>
        <a class="item-type" href="index.php?<?php echo http_build_query($settings); ?>">instellingen</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($products); ?>">producten overzicht</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($orders); ?>">bestellingen</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($logout); ?>">uitloggen</a>
    </div>
    <div id="nav">
        <a class="item-type" href="filter.php?<?php echo http_build_query($kleren); ?>">kleren</a>
        <a class="item-type" href="filter.php?<?php echo http_build_query($maskers); ?>">maskers</a>
        <a class="item-type" href="filter.php?<?php echo http_build_query($stickers); ?>">stickers</a>
        <a class="item-type" href="filter.php?<?php echo http_build_query($telefoon_hoezen); ?>">telefoon hoezen</a>
        <a class="item-type" href="filter.php?<?php echo http_build_query($posters); ?>">posters</a>
        <a class="item-type" href="filter.php?<?php echo http_build_query($accessoires); ?>">accessoires</a>
    </div>
</div>