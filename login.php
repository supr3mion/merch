<?php

?>
<div class="form-box">
    <?php include('error.php');?>
    <form action="index.php?<?php echo http_build_query($login); ?>" method="POST">
        <div class="text-box">
            <i class="fas fa-user"></i>
            <input type="email" autocomplete="login" placeholder="E-mailadres" name="email">
        </div>
        <div class="text-box">
            <i class="fas fa-key"></i>
            <input type="password" placeholder="wachtwoord" autocomplete="password" name="password">
        </div>
        <button type="submit" name="login" class="button"><i class="fas fa-sign-in-alt"></i> LOGIN</button>
    </form>
    <P>noch geen account?<br>maak er dan <a href="index.php?<?php echo http_build_query($register); //deze array is vindbaar in [header.php] ?>">hier</a> een aan</p>
</div>







<?php

// <div id="login-container">
    
// </div>
// <div class="container">
//     <h2>INLOGGEN</h2>
//     <?php include('error.php');
//     <form action="index.php" method="POST">
//         <div class="textbox">
//             <i class="fas fa-envelope"></i>
//             <input type="text" placeholder="E-mailadres / gebruikersnaam" name="email">
//         </div>
//         <div class="textbox">
//             <i class="fas fa-key"></i>
//             <input type="password" placeholder="wachtwoord" name="password">
//         </div>
//         <button type="submit" name="login" class="button">LOGIN</button>
//     </form>
// </div>



?>