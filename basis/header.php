<?php

$kleren = array("type" => "kleren", "index" => "filter");
$maskers = array("type" => "maskers", "index" => "filter");
$stickers = array("type" => "stickers", "index" => "filter");
$telefoon_hoezen = array("type" => "telefoon_hoezen", "index" => "filter");
$posters = array("type" => "posters", "index" => "filter");
$accessoires = array("type" => "accessoires", "index" => "filter");

//voor gebruikers:
$shopping_basket = array("index" => "shopping_basket");

//voor verkopers:
$orders = array("index" => "orders");
$products = array("index" => "products");

//niet ingelogd:
$login = array("index" => "login");

//alle gebruikers:
$logout = array("index" => "logout");
$settings = array("index" => "settings");

$username = $_SESSION['username'];
$reset = array("type" => "null", "index" => "home");

?>

<div id="space">
    <div id="top_part">
        <a id="reset" href="main.php?<?php echo http_build_query($reset); ?>">
            <div id="logo">
                <div id="img"></div>
                <div id="name">MAHIRO MERCH</div>
            </div>
        </a>
        <div id="search">
            <form id="search-form" action="server.php" method="POST">
                <input id="search-input" type="search" placeholder="zoeken" name="keyword">
                <button type="submit" name="search" id="button"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div id="account">
           
        <a class="item-type-user"><i id="flip" class="fas fa-chevron-left"></i><?php echo $username ?></a>
        <a class="item-type" href="main.php?<?php echo http_build_query($settings); ?>"><i class="fas fa-cogs"></i>instellingen</a>
        <a class="item-type" href="main.php?<?php echo http_build_query($shopping_basket); ?>"><i class="fas fa-shopping-basket"></i>winkelmand</a>
        <a class="item-type" href="main.php?<?php echo http_build_query($logout); ?>"><i class="fas fa-sign-out-alt"></i>uitloggen</a>
               
    </div>
    </div>
    <div id="nav">
        <a class="item-type" href="main.php?<?php echo http_build_query($kleren); ?>">kleren</a>
        <a class="item-type" href="main.php?<?php echo http_build_query($maskers); ?>">maskers</a>
        <a class="item-type" href="main.php?<?php echo http_build_query($stickers); ?>">stickers</a>
        <a class="item-type" href="main.php?<?php echo http_build_query($telefoon_hoezen); ?>">telefoon hoezen</a>
        <a class="item-type" href="main.php?<?php echo http_build_query($posters); ?>">posters</a>
        <a class="item-type" href="main.php?<?php echo http_build_query($accessoires); ?>">accessoires</a>
    </div>
</div>

