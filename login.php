<?php

?>
<div id="login-container">
    
</div>
<div class="container">
    <h2>INLOGGEN</h2>
    <?php include('error.php'); ?>
    <form action="index.php" method="POST">
        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <input type="text" placeholder="E-mailadres / gebruikersnaam" name="email">
        </div>
        <div class="textbox">
            <i class="fas fa-key"></i>
            <input type="password" placeholder="wachtwoord" name="password">
        </div>
        <button type="submit" name="login" class="button">LOGIN</button>
    </form>
</div>