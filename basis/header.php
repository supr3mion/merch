<?php


$kleren = array("type" => "kleren");
$maskers = array("type" => "maskers");
$stickers = array("type" => "stickers");
$telefoon_hoezen = array("type" => "telefoon_hoezen");
$posters = array("type" => "posters");
$accessoires = array("type" => "accessoires");

//voor gebruikers:
$settings = array("index" => "settings");
$shopping_basket = array("index" => "shopping_basket");
$logout = array("index" => "logout");

//voor verkopers:
$orders = array("index" => "orders");
$products = array("index" => "products");

//niet ingelogd:
$login = array("index" => "login");

?>

<div id="space">
    <div id="top_part">
        <div id="logo"></div>
        <div id="search"></div>
        <div id="account">
        <a class="item-type" href="index.php?<?php echo http_build_query($settings); ?>"><i id="flip" class="fas fa-chevron-left"></i><?php echo "  hello there" ?></a>
        <a class="item-type" href="index.php?<?php echo http_build_query($settings); ?>"><i class="fas fa-cogs"></i>instellingen</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($products); ?>"><i class="fas fa-plus-square"></i>uw producten</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($shopping_basket); ?>"><i class="fas fa-shopping-basket"></i>winkelmand</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($login); ?>"><i class="fas fa-sign-out-alt"></i>login</a>
    </div>
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