<?php

session_start();

$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'merch');

//login
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($email)) {
        array_push($errors, "E-mailadres of gebruikersnaam invullen"); 
    }
    if(empty($password)) {
        array_push($errors, "Wachtwoord invullen");
    }

    if (count($errors) == 0) { 
        $password = md5($password); 
        $query = "SELECT * FROM users WHERE password='$password' AND email='$email'"; 
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) ==1) { 
            
            $sqlAccount_type = "SELECT account_type FROM users WHERE password='$password' AND email='$email'";
            $resultAccount_type = mysqli_query($db, $sqlAccount_type);
    
            if ($resultAccount_type == "buyer") {
                $user = mysqli_fetch_assoc($result);
    
                $_SESSION['UID'] = $user['UID'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['account_type'] = $user['account_type'];
                header("location: switch.php");
            }
            if ($resultAccount_type == "seller") {
                $user = mysqli_fetch_assoc($result);
    
                $_SESSION['UID'] = $user['UID'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['account_type'] = $user['account_type'];
                header("location: switch.php");
            } 
            if ($resultAccount_type == "admin") {
                $user = mysqli_fetch_assoc($result);
    
                $_SESSION['UID'] = $user['UID'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['account_type'] = $user['account_type'];
                header("location: switch.php");
            }
            
        } else {
            $query_username = "SELECT * FROM users WHERE password='$password' AND username='$username'"; 
            $result_username = mysqli_query($db, $query_username);
            if (mysqli_num_rows($result_username) ==1) { 
            
                $sqlAccount_type = "SELECT account_type FROM users WHERE password='$password' AND email='$email'";
                $resultAccount_type = mysqli_query($db, $sqlAccount_type);
    
                if ($resultAccount_type == "buyer") {
                    $user = mysqli_fetch_assoc($result);
    
                    $_SESSION['UID'] = $user['UID'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['account_type'] = $user['account_type'];
                    header("location: switch.php");
                }
                if ($resultAccount_type == "seller") {
                    $user = mysqli_fetch_assoc($result);
    
                    $_SESSION['UID'] = $user['UID'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['account_type'] = $user['account_type'];
                    header("location: switch.php");
                } 
                if ($resultAccount_type == "admin") {
                    $user = mysqli_fetch_assoc($result);
    
                    $_SESSION['UID'] = $user['UID'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['account_type'] = $user['account_type'];
                    header("location: switch.php");
                }
            
            } else {
                array_push($errors, "Wachtwoord en E-mail / gebruikersnaam adres zijn verkeerd of bestaan niet");
            }
        }
    }
}

?>