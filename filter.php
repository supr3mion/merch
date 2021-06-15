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
?>