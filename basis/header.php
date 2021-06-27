<?php

$kleren = array("type" => "kleren", "index" => "filter");
$maskers = array("type" => "maskers", "index" => "filter");
$stickers = array("type" => "stickers", "index" => "filter");
$telefoon_hoezen = array("type" => "telefoon_hoezen", "index" => "filter");
$posters = array("type" => "posters", "index" => "filter");
$accessoires = array("type" => "accessoires", "index" => "filter");

//voor kopers:
$shopping_basket = array("type" => "null", "index" => "shopping_basket");

//voor verkopers:
$orders = array("type" => "null", "index" => "orders");
$products = array("type" => "overview", "index" => "products");

//niet ingelogd:
$login = array("type" => "null", "index" => "login");
$register = array("type" => "null", "index" => "register");

//alle ingelogde gebruikers:
$logout = array("type" => "null", "index" => "logout");
$settings = array("type" => "null", "index" => "settings");

//admin optie:
$account_request = array("type" => "null", "index" => "account_request");

//nodige informatie:
$account_type = $_SESSION['account_type'];
$username = $_SESSION['username'];
$UID = $_SESSION['UID'];
$reset = array("type" => "null", "index" => "home");

?>

<div id="space">
    <div id="top_part">
        <a id="reset" href="index.php?<?php echo http_build_query($reset); ?>">
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

<?php 
//php script voor gebruiker opties

if ($username == "null") {
?>

<div id="account-null">
<a class="item-type" href="index.php?<?php echo http_build_query($login); ?>"><i class="fas fa-sign-in-alt"></i> inloggen</a>

<?php
}
if ($username != "null" && $account_type == "buyer") {
?>

<div id="account">
<a class="item-type-user"><i id="flip" class="fas fa-chevron-left"></i><?php echo $username ?></a>
<a class="item-type" href="index.php?<?php echo http_build_query($settings); ?>"><i class="fas fa-cogs"></i> instellingen</a>
<a class="item-type" href="index.php?<?php echo http_build_query($shopping_basket); ?>"><i class="fas fa-shopping-basket"></i> winkelmand</a>
<a class="item-type" href="index.php?<?php echo http_build_query($logout); ?>"><i class="fas fa-sign-out-alt"></i> uitloggen</a>

<?php
}
if ($username != "null" && $account_type == "seller") {
?>

<div id="account">
<a class="item-type-user"><i id="flip" class="fas fa-chevron-left"></i><?php echo $username ?></a>
<a class="item-type" href="index.php?<?php echo http_build_query($settings); ?>"><i class="fas fa-cogs"></i> instellingen</a>
<a class="item-type" href="index.php?<?php echo http_build_query($orders); ?>"><i class="fas fa-store-alt"></i> bestellingen</a>
<a class="item-type" href="index.php?<?php echo http_build_query($products); ?>"><i class="far fa-plus-square"></i> producten</a>
<a class="item-type" href="index.php?<?php echo http_build_query($logout); ?>"><i class="fas fa-sign-out-alt"></i> uitloggen</a>

<?php
}
if ($username != "null" && $account_type == "admin") {
?>

<div id="account">
<a class="item-type-user"><i id="flip" class="fas fa-chevron-left"></i><?php echo $username ?></a>
<a class="item-type" href="index.php?<?php echo http_build_query($settings); ?>"><i class="fas fa-cogs"></i> instellingen</a>
<a class="item-type" href="index.php?<?php echo http_build_query($account_request); ?>"><i class="fas fa-store-alt"></i> account aanvraag</a>
<a class="item-type" href="index.php?<?php echo http_build_query($logout); ?>"><i class="fas fa-sign-out-alt"></i> uitloggen</a>
    
<?php
}
?>
               
    </div>
    </div>
    <div id="nav">
        <a class="item-type" href="index.php?<?php echo http_build_query($kleren); ?>">kleren</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($maskers); ?>">maskers</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($stickers); ?>">stickers</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($telefoon_hoezen); ?>">telefoon hoezen</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($posters); ?>">posters</a>
        <a class="item-type" href="index.php?<?php echo http_build_query($accessoires); ?>">accessoires</a>
    </div>
</div>
