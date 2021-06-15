<?php

include("server.php");

$index = $_GET['index'];
$type = $_GET['type'];
if ($index == "") {
    $_SESSION['UID'] = "0";
    $_SESSION['username'] = "null";
    $_SESSION['account_type'] = "null";
    $_SESSION['successful'] = "";

    $http = array("type" => "null", "index" => "home");

    header("location: index.php?" . http_build_query($http));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="basis/style-base.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/2e1bcef615.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <?php include("basis/header.php"); ?>
    </header>
    <div>

        <?php

    $current_index = "";

    if ($current_index != $index) {

        if ($index == "home") {
            include("home.php");
            $current_index = $index;
        } if ($index == "login") {
            include("login.php");
            $current_index = $index;
        } if ($index == "register") {
            include("register.php");
            $current_index = $index;
        } if ($index == "logout") {
            include("logout.php");
            $current_index = $index;
        } if ($index == "filter") {
            include("filter.php");
            $current_index = $index;
        } if ($index == "products") {
            include("products.php");
            $current_index = $index;
        }
    }

        ?>
    </div>
</body>
<footer>
    <?php include("basis/footer.html"); ?>
</footer>
</html>