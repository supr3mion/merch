<?php

session_start();

//login
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($email)) {
        array_push($errors, "E-mail adres invullen"); 
    }
    if(empty($password)) {
        array_push($errors, "Wachtwoord invullen");
    }

    if (count($errors) == 0) { 
        $password = md5($password); 
        $query = "SELECT * FROM resellers WHERE password='$password' AND email='$email'"; 
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) ==1) { 
            $sqlAdmin = "SELECT * FROM resellers WHERE password='$password' AND email='$email' AND admin='true'";
            $resultAdmin = mysqli_query($db, $sqlAdmin);
            $resultCheck = mysqli_num_rows($resultAdmin); 
            if ($resultCheck == 1) { 
                $user = mysqli_fetch_assoc($resultAdmin); 
                $_SESSION['reseller'] = $user['reseller']; 
                $_SESSION['userID'] = $user['ID']; 
                $_SESSION['admin'] = $user['admin'];
                header('location: home-admin.php');
            } else {
                $user = mysqli_fetch_assoc($result); 
                $_SESSION['deliver'] = $user['street'] ." ". $user['number'] .", ". $user['postal'] ." - ". $user['city'];
                $_SESSION['reseller'] = $user['reseller']; 
                $_SESSION['userID'] = $user['ID']; 
                $_SESSION['admin'] = "false";
                header('location: home.php'); 
            }
        } else {
            array_push($errors, "Wachtwoord en E-mail adres zijn verkeerd of bestaan niet"); 
        }
    }
}

?>