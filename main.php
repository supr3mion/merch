<?php

include("server.php");

$index = $_GET['index'];


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

        if ($index = "home") {
            include("home.php");
        }

        ?>
    </div>
    <footer>
        <?php include("basis/footer.html"); ?>
    </footer>
</body>
</html>