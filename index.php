<?php 

include("server.php");

$_SESSION['UID'] = "0";
$_SESSION['username'] = "null";
$_SESSION['account_type'] = "null";

$http = array("type" => "null", "index" => "home");

header("location: main.php?" . http_build_query($http));


?>