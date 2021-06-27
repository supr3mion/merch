<?php

session_start();

$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'merch');

//login
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($email)) {
        array_push($errors, "E-mailadres invullen"); 
    }
    if(empty($password)) {
        array_push($errors, "Wachtwoord invullen");
    }

    if (count($errors) == 0) { 
        $password = md5($password); 
        $query = "SELECT * FROM users WHERE password='$password' AND email='$email'"; 
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) ==1) { 
            $user = mysqli_fetch_assoc($result);
    
            $_SESSION['UID'] = $user['UID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['account_type'] = $user['account_type'];

            $http = array("type" => "successful_login", "index" => "filter");

            header('location: index.php?' . http_build_query($http));

        } else {
            array_push($errors, "Wachtwoord en E-mail / gebruikersnaam adres zijn verkeerd of ongeldig");
        }
    }
}


//registreren
if(isset($_POST['register'])) { //dit leest als ik de button heb gebruikt of niet, zo wel dan voert hij het onderstaande script uit
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $account_type = mysqli_real_escape_string($db, $_POST['account_type']);
    $active = "no";


    if(empty($first_name)) { //dit gebruik ik om te zien als er een veld leeg is
        array_push($errors, "voornaam is verplicht"); //als het veld leeg is word er een array push gedaan met de error info, dat word gestuurd naar error.php
    }
    if(empty($last_name)) {
        array_push($errors, "achternaam is verplicht");
    }
    if(empty($username)) {
        array_push($errors, "gebruikersnaam is verplicht");
    }

    if($password_1 != $password_2) {
        array_push($errors, "De wachtwoorden komen niet overeen");
    }

    if(empty($email)) {  //hier kijk ik weer als hij leeg is
        array_push($errors, "E-mail adres verplicht");
    } else {  //als hij niet leeg is word er naar de ingevulde email gezocht in de database
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) ==1) { //als die word gevonden dan word er weer een array push gedaan en het formulier word geannuleerd
            array_push($errors, "Dit E-mail adres is al in gebruik");
        }
    }

    if (count($errors) == 0) {  //hier word er gekeken als er geen errors in de error array staan, zoniet dan word het uitgevoerd
        $password = md5($password_1);  //hier word er een encriptie over het wachtwoord gegooid door er md5 voor te zetten en de value tusen de haakjes

        if ($phone != "") {  

            if ($account_type == "seller") {

                $sql = "INSERT INTO users (username, email, password, phone, account_type, first_name, last_name, active) 
                VALUES ('$username', '$email', '$password', '$phone', '$account_type', '$first_name', '$last_name', '$active')";  //de query voor het toevoegen van de user

                mysqli_query($db, $sql);  //het uivoeren van de query

                $http = array("type" => "successful_request", "index" => "filter");

                header('location: index.php?' . http_build_query($http));

            } else {

                $sql = "INSERT INTO users (username, email, password, phone, account_type, first_name, last_name) 
                VALUES ('$username', '$email', '$password', '$phone', '$account_type', '$first_name', '$last_name')";  //de query voor het toevoegen van de user

                mysqli_query($db, $sql);  //het uivoeren van de query

                $http = array("type" => "successful_account", "index" => "filter");


                header('location: index.php?' . http_build_query($http));
            }

            
        } else {

            if ($account_type == "seller") {
                $sql = "INSERT INTO users (username, email, password, account_type, first_name, last_name, active) 
                VALUES ('$username', '$email', '$password', '$account_type', '$first_name', '$last_name', '$active')";  //de query voor het toevoegen van de user

                mysqli_query($db, $sql);  //het uivoeren van de query

                $http = array("type" => "successful_request", "index" => "filter");

                header('location: index.php?' . http_build_query($http));

            } else {

                $sql = "INSERT INTO users (username, email, password, account_type, first_name, last_name) 
                VALUES ('$username', '$email', '$password', '$account_type', '$first_name', '$last_name')";  //de query voor het toevoegen van de user

                mysqli_query($db, $sql);  //het uivoeren van de query

                $http = array("type" => "successful_account", "index" => "filter");

                header('location: index.php?' . http_build_query($http));
            }
            
        }

    }

}

//uitloggen
if(isset($_POST['logout'])) {
    $_SESSION['UID'] = "0";
    $_SESSION['username'] = "null";
    $_SESSION['account_type'] = "null";

    $successful = "u bent succesvol uitgelogd";
    $http = array("type" => "successful_logout", "index" => "filter");

    header('location: index.php?' . http_build_query($http));
}


//create product

if(isset($_POST['create_product'])) {
    $product_name = mysqli_real_escape_string($db, $_POST['product_name']);
    $product_description = mysqli_real_escape_string($db, $_POST['product_description']);
    $product_type = mysqli_real_escape_string($db, $_POST['product_type']);
    $price1 = mysqli_real_escape_string($db, $_POST['price1']);
    $price2 = mysqli_real_escape_string($db, $_POST['price2']);
    $file = $_FILES['image'];

    $UID = $_SESSION['UID'];

    $filename = $_FILES['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
    $filesize = $_FILES['image']['size'];
    $fileerror = $_FILES['image']['error'];
    $filetype = $_FILES['image']['type'];

    $fileext = explode('.', $filename);
    $fileactualext = strtolower(end($fileext));

    $allowed = array('jpg', 'jpeg', 'png');

    //naam
    if(empty($product_name)) {
        array_push($errors, "product naam is verplicht <br>");
    }

    //prijs
    if(empty($price1)) {
        array_push($errors, "een prijs is verplicht <br>");
    } else {
        $price_whole = intval($price1);
    }
    if(empty($price2)) {
        $price_decimal = 0;
    } else {
        $price_decimal = intval($price2);
    }

    //beschrijving
    if(empty($product_description)) {
        array_push($errors, "beschrijving is verplicht <br>");
    }

    //type
    if($product_type == "selecteer product type <br>") {
        array_push($errors, "kies een product type <br>");
    }

    //foto
    if(empty($file)) {
        array_push($errors, "foto is verplicht <br>");
    }
    if (in_array($fileactualext, $allowed)) {
        if ($fileerror === 0) {
            if ($filesize > 2000000) {
                
                array_push($errors, "gekozen foto is te groot <br>");

            }
        } else {
            array_push($errors, "er was een fout tijdens het upoaden van deze foto <br>");;
        }
    } else {
        array_push($errors, "u kan alleen jpg, jpeg en png foto's uploaden <br>");;
    }

    if (count($errors) == 0) {
        $fileNameNew = $UID."product=".$product_name.".".$fileactualext;

        $sql = "INSERT INTO products (UID, name, description, product_type, img, price_whole, price_decimal) 
        VALUES ('$UID', '$product_name', '$product_description', '$product_type', '$fileNameNew', '$price_whole', '$price_decimal')";

        mysqli_query($db, $sql);

        $filedestination = 'product_image/'.$filenamenew;
        move_uploaded_file($filetmpname, $filedestination);

        $http = array("type" => "overview", "index" => "products");

        header('location: index.php?' . http_build_query($http));
    }
}

?>